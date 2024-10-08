<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Address;
use App\Models\BannerImage;
use App\Models\Brochure;
use App\Models\Certificate;
use App\Models\Clients;
use App\Models\ClientType;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\HomeBanner;
use App\Models\HomeIconBox;
use App\Models\ImageBox;
use App\Models\News;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ServiceMaster;
use App\Models\SocialMedia;
use App\Models\Video;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

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
        $icon_box = HomeIconBox::get();
        $bannerImage = BannerImage::first();
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
            'icon_box' => $icon_box,
            'bannerImage' => $bannerImage,
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
        $bannerImg = BannerImage::first();
        return view('client.pages.products',[
            'products' => $products,
            'bannerImg' => $bannerImg,
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
        $imageBox = ImageBox::get();
        return view('client.pages.why-choose-us',[
            'wca' => $wca,
            'imageBox' => $imageBox,
        ]);
    }
    public function contact(){
        $address = Address::first();
        return view('client.pages.contact',[
            'address' => $address,
        ]);
    }
    public function faq(){
        $faqs = Faq::get();
        return view('client.pages.faq',[
            'faqs' => $faqs,
        ]);
    }
    public function clients(){
        $types = ClientType::get();
        $clients = [];
        if($types){
            $clients = Clients::where('client_type_id',$types[0]->id)->get();
        }
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
    public function privacyPolicy(){
        $pp = PrivacyPolicy::first();
        return view('client.pages.privacy-policy',[
            'pp' => $pp,
        ]);
    }
    public function sendMail(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        try{
            Mail::to('mohammedarsh75@gmail.com')->send(new ContactMail([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]));
            return response()->json(['status'=>true,'message'=>'Message send successfully']);

        }catch(Throwable $th){
            info($th);
            return response()->json(['status'=>false,'message'=>'Failed to send message']);
        }
    }
}
