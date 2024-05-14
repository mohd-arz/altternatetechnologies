<?php

namespace App\Actions\Admin\Gallery;

use App\Models\Gallery;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateGalleryAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $gallery = new Gallery();
            $gallery->type = $collection['type'];
            if($collection['file']){ 
              $fileData =  $collection->get('file');              
              $gallery->file = Storage::disk('public')->put('gallery', $fileData);
            }
            if(isset($collection['is_home'])){
              $gallery->is_home = true;
            }

            $gallery->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
