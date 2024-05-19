<?php

namespace App\Http\Controllers\WhyChooseUs;

use App\Actions\Admin\WhyChooseUs\CreateWhyChooseUsAction;
use App\Actions\Admin\WhyChooseUs\ImageBox\CreateImageBoxAction;
use App\Actions\Admin\WhyChooseUs\ImageBox\EditImageBoxAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\WhyChooseUs\CreateWhyChooseUsRequest;
use App\Http\Requests\WhyChooseUs\Imagebox\CreateImageBoxRequest;
use App\Http\Requests\WhyChooseUs\Imagebox\EditImageBoxRequest;
use App\Models\ImageBox;
use App\Models\WhyChooseUs;
use Exception;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function whyChooseUs(){
        $wca = WhyChooseUs::first();
        $imageBox = ImageBox::get();
        return view('admin.why_choose_us.index',[
            'wca' => $wca,
            'imageBox' => $imageBox,
        ]);
    }
    public function whyChooseUsStore(CreateWhyChooseUsRequest $request,CreateWhyChooseUsAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'WhyChooseUs has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create WhyChooseUs.']);
    }

    // Image Box

    public function imageBoxCreate(){
        return view('admin.why_choose_us.image_box.create');
    }
    public function imageBoxStore(CreateImageBoxRequest $request,CreateImageBoxAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'ImageBox has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create ImageBox.']);
    }
    public function imageBoxEdit(ImageBox $imageBox){
        return view('admin.why_choose_us.image_box.edit',[
            'imageBox' => $imageBox,
        ]);
    }
    public function imageBoxUpdate(EditImageBoxAction $action,EditImageBoxRequest $request,ImageBox $imageBox){
        $response = $action->execute(collect($request->validated()),$imageBox);
        if ($response) {
            return response()->json(['status' => true, 'message' => 'ImageBox has been edited successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edited ImageBox.']);
    }
    public function imageBoxDelete(ImageBox $imageBox){
        try{
            $imageBox->delete();
            return response()->json(['status' => true, 'message' => 'ImageBox has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }
}
