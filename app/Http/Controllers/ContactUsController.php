<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Exception;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        $contacts = ContactUs::get();
        return view('admin.contact_us.index',[
            'contacts' => $contacts,
        ]);
    }
    public function delete(ContactUs $contact){
        try{
            $contact->delete();
            return response()->json(['status' => true, 'message' => 'Contact Us has been deleted successfully']);
        }catch(Exception $e){
            info($e);
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }
}
