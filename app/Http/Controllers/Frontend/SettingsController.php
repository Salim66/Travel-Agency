<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Package;
use App\Models\Category;
use App\Models\BookPackage;
use App\Models\ContactForm;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     * All Packages
     */
    public function allPackages(){
        $all_data = Package::where('package_holiday_offer', null)->latest()->paginate(12);
        return view('frontend.pages.all_package', compact('all_data'));
    }

    /**
     * All Holiday Packages
     */
    public function allHolidayPackages(){
        $all_data = Package::where('package_holiday_offer', true)->latest()->paginate(12);
        return view('frontend.pages.all_holiday_package', compact('all_data'));
    }

    /**
     * Destination Details
     */
    public function destinationDetails($slug){
        $data = Destination::with('categories')->where('title_slug', $slug)->first();
        return view('frontend.pages.destination_details', compact('data'));
    }

    /**
     * Category Wise Destination
     */
    public function categoryWiseDestination($id){
        $all_data = Destination::where('category_id', $id)->where('status', true)->latest()->paginate(12);
        $category = Category::where('id', $id)->first();
        return view('frontend.pages.category_wise_destination', compact('all_data', 'category'));
    }

    /**
     * Search Wise Destination
     */
    public function searchWiseDestination(Request $request){
        $search = $request->search;
        $all_data = Destination::where('title_en', 'LIKE', '%'.$search.'%')->orWhere('title_ar', 'LIKE', '%'.$search.'%')->orWhere('detials_en', 'LIKE', '%'.$search.'%')->orWhere('detials_ar', 'LIKE', '%'.$search.'%')->get();

        return view('frontend.pages.search_wise_destination', compact('all_data', 'search'));
    }
}
