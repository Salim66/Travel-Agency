<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactUsFomrController extends Controller
{
    /**
     * Contact Us All List
     */
    public function contactList(){
        $all_data = ContactForm::latest()->get();
        return view('backend.contact-us.list', compact('all_data'));
    }

    /**
     * Contact Us Delete
     */
    public function contactDelete($id){
        ContactForm::where('id', $id)->delete();

        $notification = [
            'message' => 'Contact Us Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
