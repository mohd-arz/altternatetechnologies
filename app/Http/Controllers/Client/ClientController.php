<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Brochure;
use App\Models\Certificate;
use App\Models\Clients;
use App\Models\ClientType;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\HomeBanner;
use App\Models\News;
use App\Models\Product;
use App\Models\ServiceMaster;
use App\Models\Video;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home(){
        $banners = HomeBanner::orderBy('id','desc')->get();
        $brochure = Brochure::first();
        $about = About::first();
        $products = Product::where('is_home','1')->get();
        $galleries = Gallery::where(['is_home'=>'1','type'=>'img'])->get();
        $clients = Clients::get();
        $certificates = Certificate::get();
        $video = Video::first();
        $news = News::get();
        return view('client.pages.home',[
            'banners' => $banners,
            'brochure' => $brochure,
            'about' => $about,
            'products' => $products,
            'galleries' => $galleries,
            'clients' => $clients,
            'certificates' => $certificates,
            'video' => $video,
            'news' => $news,
        ]);
    }
    public function services(){
        $service = ServiceMaster::with(['getSub','getSub.getProducts'])->first();
        return view('client.pages.services',[
            'service' => $service,
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
        $about = About::first();
    return view('client.pages.about',[
            'about' => $about
        ]);
    }
    public function whyChooseUs(){
        $wca = WhyChooseUs::first();
        return view('client.pages.why-choose-us',[
            'wca' => $wca
        ]);
    }
    public function contact(){
        return view('client.pages.contact');
    }
    public function faq(){
        $faqs = Faq::get();
        return view('client.pages.faq',[
            'faqs' => $faqs,
        ]);
    }
    public function clients(){
        $types = ClientType::get();
        $clients = Clients::where('client_type_id',$types[0]->id)->get();
        return view('client.pages.clients',[
            'clients' => $clients,
            'types' => $types,
        ]);
    }
    public function clientsByType(Request $request){
        $clients = Clients::where('client_type_id',$request->id)->get();
        return response()->json(['clients'=>$clients]);
    }
    public function news(News $news){
        return view('client.pages.news',[
            'news'=>$news,
        ]);
    }
}
