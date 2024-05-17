<?php

namespace App\Http\Controllers\Settings;

use App\Actions\Admin\Settings\Address\CreateAddressAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\Address\CreateAddressRequest;
use App\Models\Address;
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
}
