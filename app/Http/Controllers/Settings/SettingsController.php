<?php

namespace App\Http\Controllers\Settings;

use App\Actions\Admin\Settings\Address\CreateAddressAction;
use App\Actions\Admin\Settings\SocialMedia\CreateSocialMediaAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Address\CreateAddressRequest;
use App\Http\Requests\Settings\SocialMedia\CreateSocialMediaRequest;
use App\Models\Address;
use App\Models\FooterImage;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

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
    // Social Media
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
    // Footer Image
    public function footerImage(){
        $footerImage = FooterImage::first();
        return view('admin.settings.footer_image.index',[
            'footerImage' => $footerImage,
        ]);
    }
    public function footerImageStore(Request $request){
        $request->validate([
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048"
        ], [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image size must not be greater than 2MB.'
        ]);
        try{
            $footer = FooterImage::first();
            if($footer){
                Storage::disk('public')->delete($footer->image);
            }
            if(!$footer){
                $footer = new FooterImage();
              }
            if($request->hasFile('image')){
                $imageData = $request->file('image'); 
                $footer->image = Storage::disk('public')->put('settings/footerimage', $imageData);
                $footer->save();
            } 
            return response()->json(['status' => true, 'message' => 'Footer Image has been updated successfully.']);
        }catch(Throwable $th){
            info($th);
            return response()->json(['status' => false, 'error' => 'Failed to update Footer Image.']);
        }
    }
}
