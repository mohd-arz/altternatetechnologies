<?php

namespace App\Http\Controllers\PrivacyPolicy;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Throwable;

class PrivacyPolicyController extends Controller
{
    public function privacyPolicy(){
        $pp = PrivacyPolicy::first();
        return view('admin.privacy_policy.index',[
            'pp' => $pp,
        ]);
    }
    public function privacyPolicyStore(Request $request){
        $request->validate([
            'privacy_policy' => 'required',
        ]);
    
        try{
            $pp = PrivacyPolicy::first();
            if(!$pp){
                $pp = new PrivacyPolicy();
            }
            $pp->privacy_policy = $request->privacy_policy;
            $pp->save();
            return response()->json(['status' => true, 'message' => 'Privacy Policy has been updated successfully.']);
        }catch(Throwable $th){
            info($th);
            return response()->json(['status' => false, 'error' => 'Failed to update Privacy Policy.']);
        }

    }

}
