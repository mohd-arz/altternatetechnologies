<?php

namespace App\Actions\Admin\Home\IconBox;

use App\Models\HomeIconBox;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CreateIconBoxAction
{
    public function execute(Collection $collection)
    {
      HomeIconBox::truncate();
        DB::beginTransaction();
        try {

            foreach($collection['icon'] as $key => $icon){
              $newLinks = new HomeIconBox();
              $newLinks->icon = $icon;
              $newLinks->text = $collection['text'][$key];
              $newLinks->save();
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
