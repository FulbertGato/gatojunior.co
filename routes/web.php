<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\TravauxController;

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
Route::get('/logout', function () {
    Auth::logout();
    return Redirect()->route('login');
})->name('logout');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

return view('backend.dashboard');
    //return view('dashboard');
})->name('dashboard');

/**Frontend All URl */

//Home

route::get('/',[HomeController::class,'homeU'])->name('home');

//demande devis
Route::get('/quote', function () {
    return view('frontend.quote');
})->name('quote');
//UserController routes
Route::prefix('utilisateurs')->group(function(){

    route::get('/',[UserController::class,'allUser'])->name('show.user');
    route::get('/add',[UserController::class,'addUser'])->name('add.user');
    route::post('/store',[UserController::class,'storeUser'])->name('store.user');
    route::get('/edit/{id}',[UserController::class,'editUser'])->name('edit.user');
    route::get('/delete/{id}',[UserController::class,'deleteUser'])->name('delete.user');
    route::post('/update',[UserController::class,'updateUser'])->name('update.user');
});

//InvoiceContrller routes
route::get('/Factures',[InvoiceController::class,'allInvoice'])->name('show.invoice');
route::get('/Factures/add',[InvoiceController::class,'addInvoice'])->name('add.invoice');


//SliderController
Route::prefix('slider')->group(function(){
route::get('/show',[HomeController::class,'showSlider'])->name('slider.store');
route::post('/update',[HomeController::class,'updateSlider'])->name('update.slide');
route::post('/update/image',[HomeController::class,'updateSliderImage'])->name('update.slide.image');
});

//ServiceController routes
Route::prefix('service')->group(function(){
route::get('/',[serviceController::class,'allService'])->name('show.service');
route::get('/add',[serviceController::class,'addService'])->name('add.service');
route::post('/add',[serviceController::class,'addService'])->name('store.service');
route::post('/edit',[serviceController::class,'editService'])->name('edit.service');
route::post('/update',[serviceController::class,'updateService'])->name('update.service');
});

//TravauxController routes
Route::prefix('travaux')->group(function(){
    route::get('/',[TravauxController::class,'allTravaux'])->name('show.travaux');
    route::get('/add',[TravauxController::class,'addTravaux'])->name('add.travaux');
    route::post('/add',[TravauxController::class,'addTravaux'])->name('store.travaux');
    route::post('/edit',[TravauxController::class,'editTravaux'])->name('edit.travaux');
    route::post('/update',[TravauxController::class,'updateTravaux'])->name('update.travaux');
    });