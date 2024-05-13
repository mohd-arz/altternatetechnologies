<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Clients\ClientsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Faq\FaqController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Middleware\Auth;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Route;

Route::controller(ClientController::class)->group(function(){
    Route::get('/','home')->name('home.view');
    Route::get('/products','products')->name('products.view');
    Route::get('/product-details/{product}','productDetails')->name('product-details.view');
    Route::get('/gallery','gallery')->name('gallery.view');
    Route::get('/about','about')->name('aboutUs.view');
    Route::get('/why-choose-us','whyChooseUs')->name('whyChooseUs.view');
    Route::get('/contact','contact')->name('contact.view');
    Route::get('/clients','clients')->name('clients.view');
    Route::get('/clients-by-type','clientsByType')->name('clientsByType');
    Route::get('/faq','faq')->name('faq.view');
});

Route::middleware([Auth::class])->group(function(){
    Route::prefix('dashboard')->group(function(){
        Route::get('/',function(){
            return view('admin.dashboard.index');
        })->name('dashboard');
        Route::get('/profile',[DashboardController::class,'editUser'])->name('user.edit');
        Route::put('/profile',[DashboardController::class,'updateUser'])->name('user.update');
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
        Route::prefix('about')->group(function(){
            Route::controller(HomeController::class)->group(function(){
                Route::get('/','about')->name('about.view');
                Route::post('/store','aboutStore')->name('about.store');
            });
        });
    });
    Route::prefix('products')->group(function(){
        Route::controller(ProductsController::class)->group(function(){
            Route::get('/','products')->name('product.view');
            Route::get('/create','productCreate')->name('product.create');
            Route::post('/store','productStore')->name('product.store');
            Route::get('/edit/{product}','productEdit')->name('product.edit');
            Route::put('/update/{product}','productUpdate')->name('product.update');
            Route::delete('/delete/{product}','productDelete')->name('product.delete');
        });
    });
    Route::prefix('gallery')->group(function(){
        Route::controller(GalleryController::class)->group(function(){
            Route::get('/','gallery')->name('gallery_.view');
            Route::get('/create','galleryCreate')->name('gallery.create');
            Route::post('/store','galleryStore')->name('gallery.store');
            Route::delete('/delete/{gallery}','galleryDelete')->name('gallery.delete');
            Route::get('/gallery-ishome','galleryIsHome')->name('galleryIsHome');
        });
    });
    Route::prefix('clients')->group(function(){
        Route::controller(ClientsController::class)->group(function(){
            Route::get('/','clients')->name('clients_.view');
            Route::get('/create','clientsCreate')->name('clients.create');
            Route::post('/store','clientsStore')->name('clients.store');
            Route::get('/edit/{client}','clientsEdit')->name('clients.edit');
            Route::put('/update/{client}','clientsUpdate')->name('clients.update');
            Route::delete('/delete/{client}','clientsDelete')->name('clients.delete');
            Route::prefix('type')->group(function(){
                Route::get('/','type')->name('clients.type.view');
                Route::get('/create','typeCreate')->name('clients.type.create');
                Route::post('/store','typeStore')->name('clients.type.store');
                Route::get('/edit/{type}','typeEdit')->name('clients.type.edit');
                Route::put('/update/{type}','typeUpdate')->name('clients.type.update');
                Route::delete('/delete/{type}','typeDelete')->name('clients.type.delete');
            });
        });
    });
    Route::prefix('about')->group(function(){
        Route::controller(AboutController::class)->group(function(){
            Route::get('/','about')->name('about_.view');
            Route::post('/','aboutStore')->name('about_.store');
        });
    });
    Route::prefix('faq')->group(function(){
        Route::controller(FaqController::class)->group(function(){
            Route::get('/','faq')->name('faq_.view');
            Route::get('/create','faqCreate')->name('faq.create');
            Route::post('/store','faqStore')->name('faq.store');
            Route::get('/edit/{faq}','faqEdit')->name('faq.edit');
            Route::put('/store/{faq}','faqUpdate')->name('faq.update');
            Route::delete('/delete/{faq}','faqDelete')->name('faq.delete');
        });
    });
    });
});

Route::get('/login',[LoginController::class,'index'])->name('login.view');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');