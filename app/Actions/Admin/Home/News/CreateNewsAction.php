<?php

namespace App\Actions\Admin\Home\News;

use App\Models\About;
use App\Models\News;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateNewsAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $news = new News();
            if($collection['img']){
              $imageData = $collection['img']; 
              $news->img = Storage::disk('public')->put('services/news', $imageData);
            }
            $news->description = $collection['description'];
            $news->save();
            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
