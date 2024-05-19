<?php

namespace App\Actions\Admin\About;

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
            if(!$about){
                $about = new About();
            }
            $about->about_title = $collection['title'];
            $about->about_description = $collection['description'];

            if($collection['banner_img'] != null){
              $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $collection->get('banner_img')));

              $fileName = 'about_img' . time() . '.png';
              
              Storage::disk('public')->put('about/' . $fileName, $imageData);
              
              $about->about_img = 'about/' . $fileName;
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
