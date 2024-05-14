<?php

namespace App\Actions\Admin\Video;

use App\Models\Video;
use App\Models\WhyChooseUs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateVideoAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $vid = Video::first();
            if($vid){

                if (isset($collection['video'])) {
                  Storage::disk('public')->delete($vid['video']);
                  $vid->video = Storage::disk('public')->put('video', $collection->get('video'));
                }

                $vid->save();
            }else{
                $vid = new Video();
 
                if (isset($collection['video'])) {
                  $vid->video = Storage::disk('public')->put('video', $collection->get('video'));
                }
                
                $vid->save();
            } 
            

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
