<?php

namespace App\Actions\Admin\Home\Banner;

use App\Models\HomeBanner;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateBannerAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $home_banner = new HomeBanner();
            $home_banner->title = $collection['title'];
            $home_banner->sub_title = $collection['sub_title'];
            $home_banner->slogan = $collection['slogan'];
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $collection->get('banner_img')));

            $fileName = 'cropped_image_' . time() . '.png';
            
            Storage::disk('public')->put('notes/' . $fileName, $imageData);
            
            $home_banner->banner_img = 'notes/' . $fileName;
            
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
