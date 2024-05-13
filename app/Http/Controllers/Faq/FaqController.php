<?php

namespace App\Http\Controllers\Faq;

use App\Actions\Admin\Faq\CreateFaqAction;
use App\Actions\Admin\Faq\EditFaqAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\CreateFaqRequest;
use App\Http\Requests\Faq\EditFaqRequest;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function faq(){
        $faqs = Faq::get();
        return view('admin.faq.index',[
            'faqs' => $faqs,
        ]);
    }
    public function faqCreate(){
        return view('admin.faq.create');
    }
    public function faqStore(CreateFaqAction $action,CreateFaqRequest $request){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Faq has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create Faq.']);
    }
    public function faqEdit(Faq $faq){
        return view('admin.faq.edit',['faq'=>$faq]);
    }
    public function faqUpdate(Faq $faq,EditFaqRequest $request,EditFaqAction $action){
        $response = $action->execute(collect($request->validated()),$faq);
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Faq has been edited successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edit Faq.']);
    }
    public function faqDelete(Faq $faq){
        try{
            $faq->delete();
            return response()->json(['status' => true, 'message' => 'Faq has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }
}
