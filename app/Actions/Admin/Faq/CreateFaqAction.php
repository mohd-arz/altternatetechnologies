<?php

namespace App\Actions\Admin\Faq;

use App\Models\Faq;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CreateFaqAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $faq = new Faq();
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
