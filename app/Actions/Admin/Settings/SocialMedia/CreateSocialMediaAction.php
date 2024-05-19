<?php

namespace App\Actions\Admin\Settings\SocialMedia;

use App\Models\Address;
use App\Models\SocialMedia;
use App\Models\Video;
use App\Models\WhyChooseUs;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateSocialMediaAction
{
    public function execute(Collection $collection)
    {
      SocialMedia::truncate();
        DB::beginTransaction();
        try {

            foreach($collection['icon'] as $key => $icon){
              $newLinks = new SocialMedia();
              $newLinks->icon = $icon;
              $newLinks->link = $collection['link'][$key];
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
