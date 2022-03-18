<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
        $products = DB::table('product')
            ->leftJoin('promotion', 'promoID', '=', 'promotion.id')
            ->select('product.id', 'product.name', 'priceRoot', 'pricePromo', 'linkImg', 'status', 'promoID', 'startTime', 'endTime', 'limitTime')
            ->where('product.status','=','1')->get();
        foreach ($products as $p) {
            if($p->promoID){
                if ($p->limitTime == 1) {
                    $t1 = Carbon::now(7);
                    $t2 = new Carbon($p->endTime,7);
                    $p->second = $t1->diffInSeconds($t2);
                }
            }
        }
        return view('front-end.contents.home', ['products' => $products]);
    }

    function show($id){
        $product = Product::find($id);

        $promo = $product->promotion;

        $products = Product::where('status','=','1')->get();

        return view('front-end.contents.productDetail', ['product' => $product, 'promo' => $promo, 'products' => $products]);
    }
}
