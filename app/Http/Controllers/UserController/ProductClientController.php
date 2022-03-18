<?php

namespace App\Http\Controllers\UserController;

use App\Events\OrderTask;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\BankAccount;
use App\Models\Promotion;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Orders;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductClientController extends Controller
{
    function index()
    {
        $products = Product::where('status', '=', '1')->paginate(4);
        return view('front-end.contents.productList', ['products' => $products]);
    }

    function search(Request $request)
    {
        if ($request->search) {
            $products = Product::where('status', '=', '1')
                ->where('name', 'like', '%' . $request->get('search') . '%')
                ->paginate(4);
        } else {
            $products = Product::where('status', '=', '1')->paginate(4);
        }
        return view('front-end.contents.productList', ['products' => $products]);
    }

    function addCartByAmount(Request $request)
    {
        $id = $request->idProduct;
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] +=  $request->amount;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'priceRoot' => $product->priceRoot,
                'pricePromo' => $product->pricePromo,
                'linkImg' => $product->linkImg,
                'quantity' => $request->amount
            ];

            if ($product->promoID != NULL) {
                if ($product->promotion->endTime) {
                    $endTime = Carbon::create($product->promotion->endTime, 7);
                    $now = Carbon::now(7);
                    if ($now > $endTime) {
                        $cart[$id]['promoID'] = NULL;
                    } else {
                        $cart[$id]['promoID'] = $product->promoID;
                    }
                } else {
                    $cart[$id]['promoID'] = $product->promoID;
                }
            } else {
                $cart[$id]['promoID'] = $product->promoID;
            }
        }
        session()->put('cart', $cart);
        $banks = BankAccount::limit(6)->get();
        $carts = session()->get('cart');
        return view('front-end.contents.payForm', ['banks' => $banks, 'carts' => $carts]);
    }

    function addToCart($id)
    {
        $product = Product::find($id);

        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] +=  1;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'priceRoot' => $product->priceRoot,
                'pricePromo' => $product->pricePromo,
                'linkImg' => $product->linkImg,
                'quantity' => 1
            ];

            if ($product->promoID != NULL) {
                if ($product->promotion->endTime) {
                    $endTime = Carbon::create($product->promotion->endTime, 7);
                    $now = Carbon::now(7);
                    if ($now > $endTime) {
                        $cart[$id]['promoID'] = NULL;
                    } else {
                        $cart[$id]['promoID'] = $product->promoID;
                    }
                } else {
                    $cart[$id]['promoID'] = $product->promoID;
                }
            } else {
                $cart[$id]['promoID'] = $product->promoID;
            }
        }
        $count = 0;
        foreach ($cart as $c) {
            $count += $c['quantity'];
        }
        session()->put('cart', $cart);

        return response()->json([
            'code' => 200,
            'message' => 'success',
            'quantity' => $count
        ], 200);
    }

    function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            //tính tổng tiền cho riêng sản phẩm theo id đấy
            if ($carts[$request->id]['promoID'] != NULL) {
                $total = $carts[$request->id]['quantity'] * $carts[$request->id]['pricePromo'];
            } else {
                $total = $carts[$request->id]['quantity'] * $carts[$request->id]['priceRoot'];
            }
            //đếm số lượng tổng sản phẩm để cập nhật header
            $count = 0;
            foreach ($carts as $c) {
                $count += $c['quantity'];
            }
            //tính tổng tiền cho hóa đơn
            $totalBill = 0;
            foreach ($carts as $c) {
                if ($c['promoID'] != NULL) {
                    $totalBill += $c['quantity'] * $c['pricePromo'];
                } else {
                    $totalBill += $c['quantity'] * $c['priceRoot'];
                }
            }
            return response()->json([
                'id' => $request->id,
                'total' => $total,
                'quantityTotal' => $count,
                'totalBill' => $totalBill,
                'code' => 200
            ], 200);
        }
    }

    function deleteCart(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);

            session()->put('cart', $carts);

            $carts = session()->get('cart');
            $count = 0;
            foreach ($carts as $c) {
                $count += $c['quantity'];
            }
            $totalBill = 0;
            foreach ($carts as $c) {
                if ($c['promoID'] != NULL) {
                    $totalBill += $c['quantity'] * $c['pricePromo'];
                } else {
                    $totalBill += $c['quantity'] * $c['priceRoot'];
                }
            }
            $cart_component = view('front-end.components.cart_component', compact('carts'))->render();
            return response()->json([
                'cart_component' => $cart_component,
                'quantityTotal' => $count,
                'totalBill' => $totalBill,
                'code' => 200
            ], 200);
        }
    }

    function payCart(Request $request)
    {
        $cart = session()->get('cart');
        if ($cart) {


            $request->validate([
                'customerName' => 'required|max:255',
                'address' => 'required|max:255',
                'city' => 'required|max:255',
                'phoneNum' => 'required|max:20',
                'note' => 'max:255'
            ]);
            $c = new Customer([
                'name' => $request->customerName,
                'address' => $request->address,
                'city' => $request->city,
                'phoneNumber' => $request->phoneNum
            ]);
            $c->save();
            $dh = new Orders([
                'statusPay' => 0,
                'statusDeli' => 0,
                'typePay' => $request->typePay,
                'note' => $request->note,
                'customerID' => $c->id
            ]);
            if ($request->typePay == 0) {
                $digits = 5;
                $number = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
                $idBanking = 'DH' . $number;
                $check = Orders::select('idBanking')->get();
                for ($i = 0; $i < $check->count(); $i++) {
                    if ($idBanking == $check[$i]) {
                        $number = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
                        $idBanking = 'DH' . $number;
                        $i = -1;
                    }
                }
                $dh->idBanking = $idBanking;
            }
            $dh->save();

            foreach ($cart as $c) {
                $detail = new OrderDetail([
                    'productID' => $c['id'],
                    'orderID' => $dh->id,
                    'quantity' => $c['quantity']
                ]);
                if ($c['promoID'] != NULL) {
                    $detail->price = $c['pricePromo'];
                } else {
                    $detail->price = $c['priceRoot'];
                }
                $detail->save();
                session()->forget($c);
            }
            event(new OrderTask('Có đơn hàng mới, vui lòng kiểm tra!'));
            session()->flush();
            if ($dh->typePay == 0)
                return redirect()->back()->with('message', $dh->idBanking);
            else return redirect()->back()->with('message', 'tienmat');
        } else {
            return redirect()->back()->with('message', 'fail');
        }
    }
}
