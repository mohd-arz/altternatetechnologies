<?php

namespace App\Http\Controllers\Home;

use App\Actions\Admin\Home\About\CreateAboutAction;
use App\Actions\Admin\Home\Banner\CreateBannerAction;
use App\Actions\Admin\Home\Banner\EditBannerAction;
use App\Actions\Admin\Home\BannerImage\CreateBannerImageAction;
use App\Actions\Admin\Home\News\CreateNewsAction;
use App\Actions\Admin\Home\News\EditNewsAction;
use App\Actions\Admin\Home\Services\CreateServiceProductAction;
use App\Actions\Admin\Home\Services\CreateservicesAction;
use App\Actions\Admin\Home\Services\EditServiceProductAction;
use App\Actions\Admin\Home\IconBox\CreateIconBoxAction;
use App\Actions\Admin\Video\CreateVideoAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brochure\CreateBrochureRequest;
use App\Http\Requests\Home\About\CreateAboutRequest;
use App\Http\Requests\Home\Banner\CreateBannerRequest;
use App\Http\Requests\Home\Banner\EditBannerRequest;
use App\Http\Requests\Home\BannerImage\CreateBannerImageRequest;
use App\Http\Requests\News\CreateNewsRequest;
use App\Http\Requests\News\EditNewsRequest;
use App\Http\Requests\Services\CreateServiceProductsRequest;
use App\Http\Requests\Services\CreateServiceRequest;
use App\Http\Requests\Services\EditServiceProductsRequest;
use App\Http\Requests\Settings\IconBox\CreateIconBoxRequest;
use App\Models\About;
use App\Models\BannerImage;
use App\Models\Brochure;
use App\Models\Certificate;
use App\Models\HomeBanner;
use App\Models\HomeIconBox;
use App\Models\News;
use App\Models\ServiceMaster;
use App\Models\ServiceSub;
use App\Models\ServiceSubProduct;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class HomeController extends Controller
{
    // Banner -- > 
    public function banner(){
        $banners = HomeBanner::get();
        $brochure = Brochure::first();
        return view('admin.home.banner.index',[
            'banners' => $banners,
            'brochure' => $brochure,
        ]);
    }
    public function bannerCreate(){
        return view('admin.home.banner.create');
    }
    public function bannerStore(CreateBannerRequest $request,CreateBannerAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Home Banner has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create Home Banner.']);
    }
    public function bannerEdit(HomeBanner $banner){
        return view('admin.home.banner.edit',[
            'banner' => $banner,
        ]);
    }
    public function bannerUpdate(HomeBanner $banner,EditBannerRequest $request,EditBannerAction $action){
        $response = $action->execute(collect($request->validated()),$banner);
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Home Banner has been edited successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edit Home Banner.']);
    }
    public function bannerDelete(HomeBanner $banner){
        try{
            $banner->delete();
            return response()->json(['status' => true, 'message' => 'Banner has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }

    // Icon Box 
    public function iconBox(){
        $icon_box = HomeIconBox::get();
        return view('admin.home.icon_box.index',[
            'icon_box' => $icon_box,
        ]);
    }
    public function iconBoxStore(CreateIconBoxRequest $request, CreateIconBoxAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Icon Box has been updated successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to update Icon Box.']);
    }

    // Brochure --
    public function brochureStore(CreateBrochureRequest $request){
        try{
            $brochure = Brochure::first();
            if($brochure){
                Storage::disk('public')->delete($brochure->file);
                $brochure->brochure = $request->file;
                $brochure->save();
            }else{
                $brochure = new Brochure();
                $brochure->brochure = Storage::disk('public')->put('brochure', $request->file);
                $brochure->save();
            }
            return response()->json(['status' => true, 'message' => 'Brochure has been update successfully.']);
        }catch(Throwable $th){
            info($th);
            return response()->json(['status' => false, 'error' => 'Failed to update Brochure.']);
        }
    }

    // About --
    public function about(){
        $about = About::first();
        return view('admin.home.about.index',[
            'about' => $about,
        ]);
    }

    public function aboutStore(CreateAboutRequest $request,CreateAboutAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Home About has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create Home About.']);
    }

    // Certificate 
    public function certificate(){
        $certificates = Certificate::get();
        return view('admin.home.certificate.index',[
            'certificates' => $certificates
        ]);
    }
    public function certificateCreate(){
        return view('admin.home.certificate.create');
    }
    public function certificateStore(Request $request){
        try{
            $certificate = new Certificate();
            if($request->img != null){
                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->img));

                $fileName = 'certificate' . time() . '.png';
                
                Storage::disk('public')->put('certificates/' . $fileName, $imageData);
                
                $certificate->img = 'certificates/' . $fileName;

                $certificate->save();
            }
            return response()->json(['status' => true, 'message' => 'Home Certificate has been created successfully.']);
        }catch(Exception $e){
            info($e);
            return response()->json(['status' => false, 'error' => 'Failed to create Home Certificate.']);
        }
     
    }
    public function certificateDelete(Certificate $certificate){
        try{
            $certificate->delete();
            return response()->json(['status' => true, 'message' => 'Certificate has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }

    public function video(){
        $video = Video::first();
        return view('admin.home.video.index',[
            'video' => $video,
        ]);
    }
    public function videoStore(Request $request,CreateVideoAction $action){
        $request->validate([
           'video' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:35000',
        ]);
        $response = $action->execute(collect($request->all()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Home Video has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create Home Video.']);
    }

    // Services --
    public function services(){
        $service = ServiceMaster::first();
        $products = [];
        if($service){
            $products = ServiceSub::where('master_id',$service->id)->get();
        }
        return view('admin.home.services.index',[
            'service' => $service,
            'products' => $products,
        ]);
    }
    public function servicesStore(CreateServiceRequest $request,CreateServicesAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Services has been uploaded successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to upload Home Services.']);
    }
    public function productCreate(){
        return view('admin.home.services.product.create');
    }
    public function productStore(CreateServiceProductsRequest $request,CreateServiceProductAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Services Product has been uploaded successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to upload Home Services Product.']);
    }
    public function productEdit(ServiceSub $product){
        return view('admin.home.services.product.edit',[
            'product' => $product,
        ]);
    }
    public function productUpdate(ServiceSub $product,EditServiceProductAction $action,EditServiceProductsRequest $request){
        $response = $action->execute(collect($request->validated()),$product);
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Services Product has been updated successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to update Home Services Product.']);
    }
    public function productDelete(ServiceSub $product){
        try{
            $sub_products = ServiceSubProduct::where('sub_id',$product->id)->get();
            foreach($sub_products as $sub_product){
                Storage::disk('public')->delete($sub_product->img);
                $sub_product->delete();
            }
            $product->delete();
            return response()->json(['status' => true, 'message' => 'Service Product has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }

    // News 
    public function news(){
        $news = News::get();
        return view('admin.home.news.index',[
            'news' => $news,
        ]);
    }

    public function newsCreate(){
        return view('admin.home.news.create');
    }

    public function newsStore(CreateNewsRequest $request,CreateNewsAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'News has been uploaded successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to upload News.']);
    }
    public function newsEdit(News $news){
        return view('admin.home.news.edit',[
            'news' => $news,
        ]);
    }
    public function newsUpdate(News $news,EditNewsAction $action,EditNewsRequest $request){
        $response = $action->execute(collect($request->validated()),$news);
        if ($response) {
            return response()->json(['status' => true, 'message' => 'News has been edited successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edit News.']); 
    }
    // Banner Image

    public function bannerImage(){
        $bannerImg = BannerImage::first();
        return view('admin.home.banner_img.index',[
            'bannerImg' => $bannerImg,
        ]);
    }
    public function bannerImageStore(CreateBannerImageAction $action,CreateBannerImageRequest $request){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Banner Image has been edited successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edit Banner Image.']); 
    }
}
