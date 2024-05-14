<?php

namespace App\Http\Controllers\WhyChooseUs;

use App\Actions\Admin\WhyChooseUs\CreateWhyChooseUsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\WhyChooseUs\CreateWhyChooseUsRequest;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function whyChooseUs(){
        $wca = WhyChooseUs::first();
        return view('admin.why_choose_us.index',[
            'wca' => $wca,
        ]);
    }
    public function whyChooseUsStore(CreateWhyChooseUsRequest $request,CreateWhyChooseUsAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'WhyChooseUs has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create WhyChooseUs.']);
    }
}
