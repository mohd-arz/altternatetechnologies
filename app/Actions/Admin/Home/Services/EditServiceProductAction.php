<?php

namespace App\Actions\Admin\Home\Services;

use App\Models\services;
use App\Models\servicesAttribute;
use App\Models\ServiceMaster;
use App\Models\ServiceSub;
use App\Models\ServiceSubProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\ServeCommand;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditServiceProductAction
{
    public function execute(Collection $collection,Model $services)
    {
        DB::beginTransaction();
        try {
              $services->title = $collection['title'];
              $services->description = $collection['description'];
              $services->master_id = ServiceMaster::first()->id;
              $services->save();       
              $oldServiceProduct = ServiceSubProduct::where('sub_id',$services->id)->get()->pluck(null,'img');
              foreach ($collection['old_img'] as $key => $old) {
                  $product = $oldServiceProduct[$collection['old_img'][$key]]; 
                  if(isset($collection['img'][$key])){
                    Storage::disk('public')->delete($product->img);
                    $imageData = $collection['img'][$key]; 
                    $product->img = Storage::disk('public')->put('services/product', $imageData);
                  }
                  $product->img_desc = $collection['img_desc'][$key];
                  $product->save();
                  $oldServiceProduct->forget($collection['old_img'][$key]);
              }
              foreach($oldServiceProduct as $remaining){
                ServiceSubProduct::find($remaining->id)->delete();
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
