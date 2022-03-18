<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    function index(){
        $banks = BankAccount::limit(6)->get();
        return view('front-end.contents.paymentMethod',compact('banks'));
    }

    public function paymentMethod(){
        $banks = BankAccount::limit(6)->get();
        $file=fopen(storage_path("app/public/phuongthucthanhtoan.txt"), "r");
        return view('front-end.contents.paymentMethod', compact('banks','file'));
    }

    public function payment(){
        $banks = BankAccount::limit(6)->get();
        $carts = session()->get('cart');
        return view('front-end.contents.payForm', ['banks' => $banks, 'carts' => $carts]);
    }

    public function shippingPolicy(){
        $file=fopen(storage_path("app/public/chinhsachvanchuyen.txt"), "r");
        return view('front-end.contents.shippingPolicy', compact('file'));
    }

    public function aboutUs(){
        $file=fopen(storage_path("app/public/vevoichungtoi.txt"), "r");
        return view('front-end.contents.aboutus', compact('file'));
    }
}
