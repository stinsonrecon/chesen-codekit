<?php

use App\Http\Controllers\AuthController\AdminController;
use App\Http\Controllers\AuthController\BankController;
use App\Http\Controllers\AuthController\Csvc_Pttt_Controller;
use App\Http\Controllers\AuthController\RegisterController;
use App\Http\Controllers\AuthController\NewController;
use App\Http\Controllers\AuthController\ProductController;
use App\Http\Controllers\UserController\HomeController;
use App\Http\Controllers\UserController\NewsController;
use App\Http\Controllers\UserController\PaymentMethodController;
use App\Http\Controllers\UserController\ProductClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController\PromotionController;
use App\Http\Controllers\AuthController\OrderController;
use App\Http\Controllers\AuthController\OrderDetailController;
use App\Http\Controllers\AuthController\AdminHomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/aboutus', [PaymentMethodController::class, 'aboutUs'])->name("aboutus");

Route::get('/payment_method', [PaymentMethodController::class, 'paymentMethod'])->name("paymentMethod");

Route::get('/news', [NewsController::class, 'index'])->name("news");

Route::get('/shipping_policy', [PaymentMethodController::class, 'shippingPolicy'])->name("shippingPolicy");

Route::get('/payment', [PaymentMethodController::class, 'payment'])->name('payment');

Route::get('/contact', function () {
    return view('front-end.contents.contactMap');
})->name('contact');

Route::get('/news/{id}', [NewsController::class, 'show']);

Route::get('/product_detail/{id}', [HomeController::class,'show']);

Route::get('/product_list', [ProductClientController::class, 'index'])->name('productList');

Route::post('/product_list/search', [ProductClientController::class, 'search'])->name('productSearch');

Route::get('/product/add_to_cart/{id}', [ProductClientController::class, 'addToCart'])->name('addToCart');

Route::post('/payment', [ProductClientController::class, 'addCartByAmount'])->name('addCartByAmount');

Route::post('/product/update_cart', [ProductClientController::class, 'updateCart'])->name('updateCart');

Route::get('/product/delete_cart', [ProductClientController::class, 'deleteCart'])->name('deleteCart');

Route::post('/payCart', [ProductClientController::class, 'payCart'])->name('payCart');


//back-end

//login
Route::get('/login', [RegisterController::class, 'login'])->name('login');
Route::post('/login', [RegisterController::class, 'customerLogin']);

//logout
Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    //home

    Route::get('/home', [
        AdminHomeController::class, 'index'
    ])->name('admin.home')->middleware('auth');

    Route::get('/', [
       AdminHomeController::class, 'index'
    ])->middleware('auth');

    //admin
    route::get('/index',[
       AdminController::class,'index'
    ])->name('admin.index');
    route::get('/create',[
        AdminController::class,'create'
     ])->name('admin.create');
     route::post('/store',[
        AdminController::class,'store'
     ])->name('admin.store');
     route::get('/delete/{id}',[
        AdminController::class,'delete'
     ])->name('admin.delete');
     route::get('/edit/{id}',[
        AdminController::class,'edit'
     ])->name('admin.edit');
     route::post('/update/{id}',[
        AdminController::class,'update'
     ])->name('admin.update');



    //bank
    Route::prefix('bank')->group(function () {
        Route::get('/',[
            BankController::class, 'index'
        ])->name('bank.index');
        Route::get('/create', [
            BankController::class, 'create'
        ])->name('bank.create');
        Route::post('/store', [
            BankController::class, 'store'
        ])->name('bank.store');
        Route::get('/edit/{id}', [
            BankController::class, 'edit'
        ])->name('bank.edit');
        Route::post('/update/{id}', [
            BankController::class, 'update'
        ])->name('bank.update');
        Route::get('/delete/{id}', [
            BankController::class, 'delete'
        ])->name('bank.delete');
    });
    //product
    Route::prefix('product')->group(function(){
        Route::get('/',[
            ProductController::class,'index']
        )->name('product.index');
        Route::get('/create', [
            ProductController::class, 'create'
        ])->name('product.create');
        Route::post('/store', [
            ProductController::class, 'store'
        ])->name('product.store');
        Route::get('/edit/{id}', [
            ProductController::class, 'edit'
        ])->name('product.edit');
        Route::post('/update/{id}', [
            ProductController::class, 'update'
        ])->name('product.update');
        Route::get('/delete/{id}', [
            ProductController::class, 'delete'
        ])->name('product.delete');
    });

    //promotion
    Route::prefix('promotion')->group(function () {
        Route::get('/', [
            PromotionController::class, 'index'
        ])->name('promotion.index');
        Route::get('/create', [
            PromotionController::class, 'create'
        ])->name('promotion.create');
        Route::post('/store', [
            PromotionController::class, 'store'
        ])->name('promotion.store');
        Route::get('/delete/{id}', [
            PromotionController::class, 'delete'
        ])->name('promotion.delete');
        Route::post('/update/{id}', [
            PromotionController::class, 'update'
        ])->name('promotion.update');
        Route::get('/edit/{id}', [
            PromotionController::class, 'edit'
        ])->name('promotion.edit');
    });

    //order
    Route::prefix('order')->group(function () {
        Route::get('/', [
            OrderController::class, 'index'
        ])->name('order.index');
        Route::post('/search', [
            OrderController::class, 'search'
        ])->name('order.search');
        Route::get('/create', [
            OrderController::class, 'create'
        ])->name('order.create');
        Route::post('/create', [
            OrderController::class, 'store'
        ]);
        Route::get('/delete/{id}', [
            OrderController::class, 'delete'
        ])->name('order.delete');
        Route::get('/edit/{id}', [
            OrderController::class, 'edit'
        ])->name('order.edit');
        Route::post('/update/{id}', [
            OrderController::class, 'update'
        ])->name('order.update');
    });

    //orderDetail
    Route::prefix('orderDetail')->group(function () {
        Route::get('/{id}', [
            OrderDetailController::class, 'index'
        ])->name('orderDetail.index');
        Route::post('/create', [
            OrderDetailController::class, 'store'
        ])->name('orderDetail.store');
        Route::get('/create/{id}', [
            OrderDetailController::class, 'create'
        ])->name('orderDetail.create');
        Route::get('/edit/{id}/{oID}', [
            OrderDetailController::class, 'edit'
        ])->name('orderDetail.edit');
        Route::post('/update', [
            OrderDetailController::class, 'update'
        ])->name('orderDetail.update');
        Route::get('/delete/{id}/{oID}', [
            OrderDetailController::class, 'delete'
        ])->name('orderDetail.delete');
    });

    //new
    Route::prefix('news')->group(function () {
        Route::get('/', [
            NewController::class, 'index'
        ])->name('new.index');
        Route::get('/create', [
            NewController::class, 'create'
        ])->name('new.create');
        Route::post('/store', [
            NewController::class, 'store'
        ])->name('new.store');
        Route::get('/edit/{id}', [
            NewController::class, 'edit'
        ])->name('new.edit');
        Route::post('/update/{id}', [
            NewController::class, 'update'
        ])->name('new.update');
        Route::get('/delete/{id}', [
            NewController::class, 'delete'
        ])->name('new.delete');
    });

    //chinh sach van chuyen va phuong thuc thanh toan
    Route::prefix('csvcandpttt')->group(function () {
        Route::get('/csvc', [
            Csvc_Pttt_Controller::class, 'indexa'
        ])->name('a.index');
        Route::post('/csvc/store', [
            Csvc_Pttt_Controller::class, 'storea'
        ])->name('a.store');
        Route::get('/pttt', [
            Csvc_Pttt_Controller::class, 'indexb'
        ])->name('b.index');
        Route::post('/pttt/store', [
            Csvc_Pttt_Controller::class, 'storeb'
        ])->name('b.store');
        Route::get('/vvct', [
            Csvc_Pttt_Controller::class, 'indexc'
        ])->name('c.index');
        Route::post('/vvct/store', [
            Csvc_Pttt_Controller::class, 'storec'
        ])->name('c.store');
    });
});
