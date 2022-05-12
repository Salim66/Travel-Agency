<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Contact Us Page Load
     */
    public function contactUs(){
        return view('frontend.pages.contact_us');
    }

    /**
     * Contact form submit from user
     */
    public function contactFormSubmit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        ContactForm::create($request->all());

        $notification = [
            'message' => 'Contact Form Submitted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
