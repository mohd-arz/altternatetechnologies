<?php

namespace App\Actions\Admin\Clients;

use App\Models\Clients;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateClientsAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $clients = new Clients();
            $clients->client_type_id = $collection['type'];
            if($collection['file']){ 
              $fileData =  $collection->get('file');              
              $clients->img = Storage::disk('public')->put('clients/', $fileData);
            }

            $clients->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
