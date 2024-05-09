<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\Admin\Dashboard\User\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdateUserRequest;

class DashboardController extends Controller
{
    public function editUser(){
        $user = auth()->user();
        if($user){
            return view('admin.dashboard.edit',[
                'user'=>$user,
            ]);
        }
        return;
    }
    public function updateUser(UpdateUserRequest $request,UpdateUserAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'User has been edited successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edit User.']);
    }
}
