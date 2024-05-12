<?php

namespace App\Http\Controllers\Gallery;

use App\Actions\Admin\Gallery\CreateGalleryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\CreateGalleryRequest;
use App\Models\Gallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class GalleryController extends Controller
{
    public function gallery(){
        $galleries = Gallery::get();
        return view('admin.gallery.index',[
            'galleries'=> $galleries,
        ]);
    }
    public function galleryCreate(){
        return view('admin.gallery.create');
    }
    public function galleryStore(CreateGalleryRequest $request,CreateGalleryAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Gallery has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edit Gallery.']);
    }
    public function galleryDelete(Gallery $gallery){
        try{
            $gallery->delete();
            return response()->json(['status' => true, 'message' => 'Gallery has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }
    public function galleryIsHome(Request $request){
        $gallery = Gallery::find($request->id);
        if($request->isChecked){
            $gallery->is_home = true;
        }else{
            $gallery->is_home = false;
        }
        $gallery->save();
        return response()->json(['status'=>true,'message'=>'Switched to Home']);
    }
}
