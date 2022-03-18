<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    
    public function index(){
        $products = Product::select('quantity')->get();
        $colours = [];
        for ($i=0; $i<=count($products); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        $productName = Product::select(DB::raw("name as nameOfProduct")) 
                        ->pluck('nameOfProduct');
        $productQty = Product::select(DB::raw("quantity as qtyOfProduct"))
                        ->pluck('qtyOfProduct');
        $productN = [];
        foreach($productName as $index=>$value){
            $productN[] = $value;
        }
       /// dd($productN);
        $productQ = [];
        foreach($productQty as $index=>$value){
            $productQ[] = $value;
        }
        //dd($productQ);

        $orders = Orders::select('statusDeli')->get();

        $orderCount = Orders::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("month(created_at)"))
                ->pluck('count');
        $months = Orders::select(DB::raw("month(created_at) as count"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("month(created_at)"))
                ->pluck('count');
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($months as $index => $month){
            --$month;
            $data[$month] = $orderCount[$index];
        }
        
        $orderDetails = DB::table('orderdetail')
        ->join('orders', 'orderID', '=', 'orders.id')
        ->where('orders.statusPay', '=', 1)
        ->select('quantity', 'price')->get();
        return view('back-end.contents.home', compact('products', 'orders', 'orderDetails', 'data', 'months', 'orderCount', 'productName', 'productN','productQty', 'productQ', 'colours'));        
    }
}
