<?php

namespace App\Actions\Admin\Settings\Address;

use App\Models\Address;
use App\Models\Video;
use App\Models\WhyChooseUs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateAddressAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $address = Address::first();

            if(!$address){
              $address = new Address();
            }
            $address->addr1 = $collection['addr1'];            
            $address->addr2 = $collection['addr2'];            
            $address->email = $collection['email'];
            $address->main_phno = $collection['main_phno'];
            $address->alter_phno1 = $collection['alter_phno1'];
            $address->alter_phno2 = $collection['alter_phno2'];
            $address->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
