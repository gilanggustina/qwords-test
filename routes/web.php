<?php

use App\Http\Controllers\{
    Auth\LoginController,
    Auth\RegisterController,
    Invoice\InvoiceController,
    Domain\DomainC
};
use App\Http\Controllers\Checkout\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('check-domain.index');
})->name('check-domain');

Route::post('/search-domain',[DomainC::class,"seacrhDomain"] )->name('search-domain');

Route::group(["prefix"=>"/register","as"=>"register."],function () {
    Route::get('/',[RegisterController::class,"form"])->name("index");
    Route::post('/store',[RegisterController::class,"store"])->name("store");
});

Route::group(["prefix"=>"/login","as"=>"login."],function () {
    Route::get('/',[LoginController::class,"form"])->name("index");
    Route::post('/authenticate',[LoginController::class,"authenticate"])->name("authenticate");
});

Route::get('/checkout',[CheckoutController::class,"checkoutForm"] )->name('checkout-form');

Route::middleware(['auth'])->group(function () {
    
    Route::group(["prefix"=>"/checkout","as"=>"checkout."],function () {
        Route::post('/store',[CheckoutController::class,"checkout"] )->name('checkout');
    });
    Route::group(["prefix"=>"/invoice","as"=>"invoice."],function () {
        Route::get('/{invoiceId}',[InvoiceController::class,"detail"])->name("detail");
        Route::get('/export/{invoiceId}',[InvoiceController::class,"export"])->name("export");
    });
    Route::get('logout',[LoginController::class,"logout"])->name("logout");
});



