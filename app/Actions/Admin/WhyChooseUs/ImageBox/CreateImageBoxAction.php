<?php

namespace App\Actions\Admin\WhyChooseUs\ImageBox;

use App\Models\About;
use App\Models\ImageBox;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateImageBoxAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
          
           $imageBox = new ImageBox();
           $imageBox->title = $collection['title'];
           $imageBox->description = $collection['description'];
           if($collection['image']){
            $imageData =  $collection->get('image');              
            $imageBox->image = Storage::disk('public')->put('whychooseus/imagebox', $imageData);
           }
           $imageBox->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
