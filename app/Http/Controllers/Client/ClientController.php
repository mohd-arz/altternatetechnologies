<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Gallery;
use App\Models\HomeBanner;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(){
        $banners = HomeBanner::orderBy('id','desc')->get();
        $about = About::first();
        $products = Product::where('is_home','1')->get();
        $galleries = Gallery::where(['is_home'=>'1','type'=>'img'])->get();
        return view('client.pages.home',[
            'banners' => $banners,
            'about' => $about,
            'products' => $products,
            'galleries' => $galleries,
        ]);
    }
    public function products(){
        $products = Product::get();
        return view('client.pages.products',[
            'products' => $products,
        ]);
    }
    public function productDetails(Product $product){
        $products = Product::where('id','!=',$product->id)->get();
        return view('client.pages.product-details',[
            'products' => $products,
            'product' => $product,
        ]);
    }
    public function gallery(){
        $images = Gallery::where('type','img')->get();
        $videos = Gallery::where('type','vid')->get();
        return view('client.pages.gallery',[
            'images' => $images,
            'videos' => $videos,
        ]);
    }
    public function about(){
        return view('client.pages.about',[
        ]);
    }
    public function whyChooseUs(){
        return view('client.pages.why-choose-us');
    }
    public function contact(){
        return view('client.pages.contact');
    }
    public function faq(){
        return view('client.pages.faq');
    }
}
