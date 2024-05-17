<?php

namespace App\Actions\Admin\Home\Services;

use App\Models\services;
use App\Models\servicesAttribute;
use App\Models\ServiceMaster;
use Illuminate\Foundation\Console\ServeCommand;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateServicesAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $services = ServiceMaster::first();
            if($services){
              $services->title = $collection['title'];
              $services->description = $collection['description'];
          
              if(isset($collection['img1']) && $collection['img1']){ 
                Storage::disk('public')->delete($services->img1);
                $imageData =  $collection->get('img1');              
                $services->img1 = Storage::disk('public')->put('services', $imageData);
              }
              if(isset($collection['img2']) && $collection['img2']){
                Storage::disk('public')->delete($services->img2);
                $imageData =  $collection->get('img2');              
                $services->img2 = Storage::disk('public')->put('services', $imageData);
              }
              if(isset($collection['img3']) && $collection['img3']){
                Storage::disk('public')->delete($services->img3);
                $imageData =  $collection->get('img3');              
                $services->img3 = Storage::disk('public')->put('services', $imageData);
              }
              $services->save();
            }else{
              $services = new ServiceMaster();
              $services->title = $collection['title'];
              $services->description = $collection['description'];
        
              if($collection['img1']){ 
                $imageData =  $collection->get('img1');              
                $services->img1 = Storage::disk('public')->put('services', $imageData);
              }
              if($collection['img2']){
                $imageData =  $collection->get('img2');              
                $services->img2 = Storage::disk('public')->put('services', $imageData);
              }
              if($collection['img3']){
                $imageData =  $collection->get('img3');              
                $services->img3 = Storage::disk('public')->put('services', $imageData);
              }
              $services->save();            
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
