<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(){
        return view('client.pages.home');
    }

    public function products(){
        return view('client.pages.products');
    }
    public function gallery(){
        return view('client.pages.gallery');
    }
    public function about(){
        return view('client.pages.about');
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
