<?php

namespace App\Http\Controllers\Home;

use App\Actions\Admin\Home\Banner\CreateBannerAction;
use App\Actions\Admin\Home\Banner\EditBannerAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\Banner\CreateBannerRequest;
use App\Http\Requests\Home\Banner\EditBannerRequest;
use App\Models\HomeBanner;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function banner(){
        $banners = HomeBanner::get();
        return view('admin.home.banner.index',[
            'banners' => $banners,
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
}
