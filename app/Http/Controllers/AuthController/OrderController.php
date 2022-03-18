<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $orders = DB::table('orders')
            ->join('customer', 'customerID', '=', 'customer.id')
            ->select('idBanking', 'customer.name', 'customer.address', 'customer.phoneNumber', 'orders.id', 'orders.statusPay', 'orders.statusDeli', 'orders.typePay', 'orders.note', 'orders.created_at')
            ->orderBy('orders.created_at', 'desc')
            ->orderBy('statusPay', 'asc')->latest()
            ->paginate(10);

        return view('back-end.admin.order.order', compact('orders'));
    }

    public function search(Request $request){
        if($request->search){
            $orders = DB::table('orders')
            ->join('customer', 'customerID', '=', 'customer.id')
            ->select('idBanking', 'customer.name', 'customer.address', 'customer.city', 'customer.phoneNumber', 'orders.id', 'orders.statusPay', 'orders.statusDeli', 'orders.typePay', 'orders.note')
            ->where('idBanking', 'like', '%' . $request->get('search') . '%')
            ->orWhere('customer.phoneNumber', 'like', '%' . $request->get('search') . '%')
            ->paginate(10);
        } else {
            $orders = DB::table('orders')
            ->join('customer', 'customerID', '=', 'customer.id')
            ->select('idBanking', 'customer.name', 'customer.address', 'customer.city', 'customer.phoneNumber', 'orders.id', 'orders.statusPay', 'orders.statusDeli', 'orders.typePay', 'orders.note')
            ->paginate(10);
        }
        return view('back-end.admin.order.order', compact('orders'));
    }

    public function create()
    {
        return view('back-end.admin.order.addOrder');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'phoneNumber' => 'required|max:20',
            'statusPay' => 'required',
            'statusDeli' => 'required',
            'typePay' => 'required|max:255'
        ]);
        //dữ liệu đã oke
        $customer = Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phoneNumber' => $request->phoneNumber,
        ]);

        $dh = new Orders([
            'statusPay' => $request->statusPay,
            'statusDeli' => $request->statusDeli,
            'typePay' => $request->typePay,
            'note' => $request->note,
            'customerID' => $customer->id,
        ]);
        if($request->typePay == 0){
            $digits = 5;
            $number = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
            $idBanking = 'DH'.$number;
            $check = Orders::select('idBanking')->get();
            for ($i=0; $i < $check->count(); $i++) { 
                if ($idBanking == $check[$i]) {
                    $number = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                    $idBanking = 'DH'.$number;
                    $i=-1;
                }
            }
            $dh->idBanking = $idBanking;
        }
        $dh->save();
        session()->flash('success', 'Thêm mới đơn hàng thành công!');
        return redirect()->route('order.index');
    }

    public function delete($id)
    {
        $c = Orders::where('id', $id)->first()->customer();
        OrderDetail::where('orderID',$id)->delete();
        Orders::where('id', $id)->delete();
        $c->delete();
        session()->flash('success', 'Xoá đơn hàng thành công!');

        return redirect()->route('order.index');
    }

    public function edit(Request $request, $id)
    {
        $orders = DB::table('orders')->find($id);
        $customers = DB::table('customer')->find($orders->customerID);
        return view('back-end.admin.order.editOrder', compact('customers', 'orders'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'phoneNumber' => 'required|max:20',
            'statusPay' => 'required',
            'statusDeli' => 'required',
            'typePay' => 'required|max:255'
        ]);
        $dh = Orders::find($id);
        if ($dh->typePay == 1 && $request->typePay == 0) {
            $digits = 5;
            $number = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
            $idBanking = 'DH'.$number;
            $check = Orders::select('idBanking')->get();
            for ($i=0; $i < $check->count(); $i++) { 
                if ($idBanking == $check[$i]) {
                    $number = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                    $idBanking = 'DH'.$number;
                    $i=-1;
                }
            }
            $dh->idBanking = $idBanking;
        }
            $dh->statusPay = $request->statusPay;
            $dh->statusDeli = $request->statusDeli;
            $dh->typePay = $request->typePay;
            $dh->note = $request->note;
        $dh->save();
        Customer::where('id', '=', $dh->customerID)
            ->update([
                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'phoneNumber' => $request->phoneNumber,
            ]);

        session()->flash('success', 'Cập nhật đơn hàng thành công!');

        return redirect()->route('order.index');
    }
}
