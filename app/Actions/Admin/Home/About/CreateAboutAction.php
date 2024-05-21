<?php

namespace App\Actions\Admin\Home\About;

use App\Models\About;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateAboutAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $about = About::first();
            if($about){
                Storage::disk('public')->delete($about->home_img);
            }else{
                $about = new About();
            }
            $about->home_title = $collection['title'];
            $about->home_description = $collection['description'];

            if($collection['banner_img'] != null){
              $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $collection->get('banner_img')));

              $fileName = 'home_about_img' . time() . '.png';
              
              Storage::disk('public')->put('home_about/' . $fileName, $imageData);
              
              $about->home_img = 'home_about/' . $fileName;
            }
            
            $about->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
