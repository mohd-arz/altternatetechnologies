<?php

namespace App\Actions\Admin\Faq;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EditFaqAction
{
    public function execute(Collection $collection,Model $faq)
    {
        DB::beginTransaction();
        try {
            $faq->question = $collection['question'];
            $faq->answer = $collection['answer'];

            $faq->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
