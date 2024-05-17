<?php

namespace App\Actions\Admin\Home\Services;

use App\Models\services;
use App\Models\servicesAttribute;
use App\Models\ServiceMaster;
use App\Models\ServiceSub;
use App\Models\ServiceSubProduct;
use Illuminate\Foundation\Console\ServeCommand;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateServiceProductAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
           
              $services = new ServiceSub();
              $services->title = $collection['title'];
              $services->description = $collection['description'];
              $services->master_id = ServiceMaster::first()->id;
              $services->save();       
              
              foreach ($collection['img'] as $key => $img) {
                $serviceProduct = new ServiceSubProduct();
                $imageData = $img; 
                $serviceProduct->img = Storage::disk('public')->put('services/product', $imageData);
                $serviceProduct->img_desc = $collection['img_desc'][$key];
                $serviceProduct->sub_id = $services->id;
                $serviceProduct->save();
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
