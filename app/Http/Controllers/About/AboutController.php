<?php

namespace App\Http\Controllers\About;

use App\Actions\Admin\About\CreateAboutAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\About\CreateAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        $about = About::first();
        return view('admin.about.index',[
            'about'=> $about,
        ]);
    }
    public function aboutStore(CreateAboutRequest $request,CreateAboutAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'About has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create About.']);
    }
}
