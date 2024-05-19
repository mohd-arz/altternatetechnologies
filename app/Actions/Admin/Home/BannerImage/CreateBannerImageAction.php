<?php

namespace App\Actions\Admin\Home\BannerImage;

use App\Models\Address;
use App\Models\BannerImage;
use App\Models\Video;
use App\Models\WhyChooseUs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateBannerImageAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $bannerImage = BannerImage::first();

            if($bannerImage){
              Storage::disk('public')->delete($bannerImage->image1);
              Storage::disk('public')->delete($bannerImage->image2);
            }

            if(!$bannerImage){
              $bannerImage = new BannerImage();
            }
            $bannerImage->title1 = $collection['title1'];            
            $bannerImage->title2 = $collection['title2']; 
            if(isset($collection['image1']) && $collection['image1']){
              $imageData = $collection['image1']; 
              $bannerImage->image1 = Storage::disk('public')->put('home/bannerimage', $imageData);
            } 
            if(isset($collection['image2']) && $collection['image2']){
              $imageData = $collection['image2']; 
              $bannerImage->image2 = Storage::disk('public')->put('home/bannerimage', $imageData);
            } 

            $bannerImage->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
