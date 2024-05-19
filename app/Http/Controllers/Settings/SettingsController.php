<?php

namespace App\Http\Controllers\Settings;

use App\Actions\Admin\Settings\Address\CreateAddressAction;
use App\Actions\Admin\Settings\SocialMedia\CreateSocialMediaAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Address\CreateAddressRequest;
use App\Http\Requests\Settings\SocialMedia\CreateSocialMediaRequest;
use App\Models\Address;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function address(){
        $address = Address::first();;
        return view('admin.settings.address.index',[
            'address' => $address,
        ]);
    }
    public function addressStore(CreateAddressAction $action,CreateAddressRequest $request){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Address has been uploaded successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to upload Address.']);
    }
    public function socialMedia(){
        $social_media = SocialMedia::get();
        return view('admin.settings.social_media.index',[
            'social_media' => $social_media,
        ]);
    }
    public function socialMediaStore(CreateSocialMediaRequest $request,CreateSocialMediaAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Social Media has been updated successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to update Social Media.']);
    }
}
