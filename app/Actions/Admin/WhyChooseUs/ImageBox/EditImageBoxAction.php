<?php

namespace App\Actions\Admin\WhyChooseUs\ImageBox;

use App\Models\About;
use App\Models\ImageBox;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditImageBoxAction
{
    public function execute(Collection $collection,Model $imageBox)
    {
        DB::beginTransaction();
        try {
          
           $imageBox->title = $collection['title'];
           $imageBox->description = $collection['description'];
           if(isset($collection['image']) && $collection['image']){
            Storage::disk('public')->delete($imageBox->image);
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
