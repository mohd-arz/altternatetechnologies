<?php

namespace App\Actions\Admin\Home\News;

use App\Models\About;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditNewsAction
{
    public function execute(Collection $collection,Model $news)
    {
        DB::beginTransaction();
        try {
            if(isset($collection['img']) && $collection['img']){
              Storage::disk('public')->delete($news->img);
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
