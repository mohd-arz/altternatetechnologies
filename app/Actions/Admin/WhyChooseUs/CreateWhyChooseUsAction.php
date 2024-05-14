<?php

namespace App\Actions\Admin\WhyChooseUs;

use App\Models\WhyChooseUs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateWhyChooseUsAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $wca = WhyChooseUs::first();
            if($wca){
                $wca->title = $collection['title'];
                $wca->description = $collection['description'];

                if (isset($collection['img1'])) {
                    Storage::disk('public')->delete($wca['img1']);
                    $wca->img1 = Storage::disk('public')->put('whychooseus', $collection->get('img1'));
                }
                
                if (isset($collection['img2'])) {
                    Storage::disk('public')->delete($wca['img2']);
                    $wca->img2 = Storage::disk('public')->put('whychooseus', $collection->get('img2'));
                }
                
                if (isset($collection['img3'])) {
                    Storage::disk('public')->delete($collection->get('img3'));
                    $wca->img3 = Storage::disk('public')->put('whychooseus', $collection->get('img3'));
                }

                $wca->save();
            }else{
                $wca = new WhyChooseUs();
                $wca->title = $collection['title'];
                $wca->description = $collection['description'];

                if (isset($collection['img1'])) {
                    $wca->img1 = Storage::disk('public')->put('whychooseus', $collection->get('img1'));
                }
                
                if (isset($collection['img2'])) {
                    $wca->img2 = Storage::disk('public')->put('whychooseus', $collection->get('img2'));
                }
                
                if (isset($collection['img3'])) {
                    $wca->img3 = Storage::disk('public')->put('whychooseus', $collection->get('img3'));
                }
                $wca->save();
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
