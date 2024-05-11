<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(ClientController::class)->group(function(){
    Route::get('/','home')->name('home.view');
    Route::get('/products','products')->name('products.view');
    Route::get('/gallery','gallery')->name('gallery.view');
    Route::get('/about','about')->name('about.view');
    Route::get('/why-choose-us','whyChooseUs')->name('whyChooseUs.view');
    Route::get('/contact','contact')->name('contact.view');
    Route::get('/faq','faq')->name('faq.view');
});

Route::middleware([Auth::class])->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::get('/',function(){
            return view('admin.dashboard.index');
        })->name('dashboard');
        Route::get('/profile',[DashboardController::class,'editUser'])->name('user.edit');
        Route::put('/profile',[DashboardController::class,'updateUser'])->name('user.update');
    });
    // Home Controller -- 
    Route::prefix('home')->group(function(){
        Route::prefix('banner')->group(function(){
            Route::controller(HomeController::class)->group(function(){
                Route::get('/','banner')->name('banner.view');
                Route::get('/create','bannerCreate')->name('banner.create');
                Route::post('/store','bannerStore')->name('banner.store');
                Route::get('/edit/{banner}','bannerEdit')->name('banner.edit');
                Route::put('/update/{banner}','bannerUpdate')->name('banner.update');
                Route::delete('/delete/{banner}','bannerDelete')->name('banner.delete');
            });
        });
    });
});

Route::get('/login',[LoginController::class,'index'])->name('login.view');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');