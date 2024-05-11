<?php

namespace App\Actions\Admin\Home\Banner;

use App\Models\HomeBanner;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditBannerAction
{
    public function execute(Collection $collection,Model $home_banner)
    {
        DB::beginTransaction();
        try {
            $home_banner->title = $collection['title'];
            $home_banner->sub_title = $collection['sub_title'];
            $home_banner->slogan = $collection['slogan'];
            if($collection['banner_img'] != null){
              $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $collection->get('banner_img')));
  
              $fileName = 'home_banner' . time() . '.png';
              
              Storage::disk('public')->put('home_banner/' . $fileName, $imageData);
              
              $home_banner->banner_img = 'home_banner/' . $fileName;
            }
            $home_banner->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
