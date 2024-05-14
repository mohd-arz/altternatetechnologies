<?php

namespace App\Actions\Admin\Clients;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EditClientsAction
{
    public function execute(Collection $collection,Model $clients)
    {
        DB::beginTransaction();
        try {
            $clients->client_type_id = $collection['type'];
            if(isset($collection['file']) && $collection['file']){ 
              Storage::disk('public')->delete($clients->file);
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
