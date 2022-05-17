<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BookPackage;
use App\Models\ContactForm;
use App\Models\Package;
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

    /**
     * Package Details
     */
    public function packageDetails($slug){
        $data = Package::with(['categories', 'countries', 'districts'])->where('package_title_slug', $slug)->first();
        return view('frontend.pages.package_details', compact('data'));
    }

    /**
     * Package Booking
     */
    public function packageBookingForm(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'adult' => 'required',
            'date' => 'required',
        ]);

        BookPackage::create($request->all());

        $notification = [
            'message' => 'Your Package Book Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
