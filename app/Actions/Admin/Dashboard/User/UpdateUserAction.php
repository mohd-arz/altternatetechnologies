<?php

namespace App\Actions\Admin\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    public function execute(Collection $collection)
    {
        DB::beginTransaction();
        try {
            $user =User::find(auth()->user()->id);
            $user->name = $collection['name'];
            $user->email = $collection['email'];
            if($collection['password']){
                $user->password = Hash::make($collection['password']);
            }
            $user->save();
            DB::commit();

            return true;
        } catch (\Throwable $th) {
            info($th);

            DB::rollback();

            return false;
        }
    }
}
