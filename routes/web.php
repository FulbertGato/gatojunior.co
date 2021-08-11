<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\serviceController;

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
        /**Frontend All URl */

        //Home

        route::get('/',[HomeController::class,'homeU'])->name('home');

        //demande devis
        Route::get('/quote', function () {
            return view('frontend.quote');
        });
        //portfolio
        Route::get('/portfolio', function () {
            return view('frontend.portfolio');
        });

        Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

        return view('backend.dashboard');
            //return view('dashboard');
        })->name('dashboard');

        Route::get('/logout', function () {
            Auth::logout();
            return Redirect()->route('login');
        });

//UserController routes
route::get('/utilisateurs',[UserController::class,'allUser'])->name('show.user');
route::get('/utilisateurs/add',[UserController::class,'addUser'])->name('add.user');

//InvoiceContrller routes
route::get('/Factures',[InvoiceController::class,'allInvoice'])->name('show.invoice');
route::get('/Factures/add',[InvoiceController::class,'addInvoice'])->name('add.invoice');


//SliderContrller
route::get('/slider/show',[HomeController::class,'showSlider'])->name('slider.store');
route::post('/slider/update',[HomeController::class,'updateSlider'])->name('update.slide');
route::post('/slider/update/image',[HomeController::class,'updateSliderImage'])->name('update.slide.image');

//ServiceController routes
route::get('/service',[serviceController::class,'allService'])->name('show.service');
route::get('/service/add',[serviceController::class,'addService'])->name('add.service');
route::post('/service/add',[serviceController::class,'addService'])->name('store.service');
route::post('/service/edit/',[serviceController::class,'editService'])->name('edit.service');
route::post('/service/update/',[serviceController::class,'updateService'])->name('update.service');
