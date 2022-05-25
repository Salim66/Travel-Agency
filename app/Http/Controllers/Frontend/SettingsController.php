<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\About;
use App\Models\Package;
use App\Models\Category;
use App\Models\BookPackage;
use App\Models\ContactForm;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\Subscriber;
use App\Models\Terms;
use App\Notifications\PackageBookingNotification;
use Illuminate\Support\Facades\Notification;

class SettingsController extends Controller
{
    /**
     * Contact Us Page Load
     */
    public function contactUs(){
        return view('frontend.pages.contact_us');
    }

    /**
     * About Us Page load
     */
    public function aboutUs(){
        $data = About::findOrFail(1);
        return view('frontend.pages.about_us', compact('data'));
    }

    /**
     * Terms Condition Page load
     */
    public function termsAndCondition(){
        $all_data = Terms::all();
        return view('frontend.pages.terms_condition', compact('all_data'));
    }

    /**
     * Privacy Policy Page load
     */
    public function privacyPolicy(){
        $all_data = Policy::all();
        return view('frontend.pages.privacy_policy', compact('all_data'));
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

        $data = BookPackage::create([
            'package_id' => $request->package_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adult' => $request->adult,
            'child' => $request->child,
            'date' => $request->date,
            'message' => $request->message,
            'adult_cost' => $request->adult_cost,
            'child_cost' => $request->child_cost,
            'total_cost' => $request->total_cost,
        ]);


        Notification::route('mail',$request->email)
                ->notify(new PackageBookingNotification($data));

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

    /**
     * Date Wise Post
     */
    public function dateWisePost($id){
        $data = Post::findOrFail($id);
        $all_data = Post::with('users')->where('date', $data->date)->latest()->paginate(12);
        return view('frontend.pages.date_wise_post', compact('all_data'));
    }

    /**
     * User Wise Post
     */
    public function userWisePost($id){
        $data = Post::findOrFail($id);
        $all_data = Post::with('users')->where('user_id', $data->user_id)->latest()->paginate(12);
        return view('frontend.pages.user_wise_post', compact('all_data'));
    }

    /**
     * Post Details
     */
    public function postDetails($slug){
        $data = Post::with(['categories', 'tags', 'users'])->where('title_slug', $slug)->first();
        return view('frontend.pages.post_details', compact('data'));
    }


    /**
     * Search Wise Post
     */
    public function searchWisePost(Request $request){
        $search = $request->search;
        $all_data = Post::where('title_en', 'LIKE', '%'.$search.'%')->orWhere('title_ar', 'LIKE', '%'.$search.'%')->orWhere('details_en', 'LIKE', '%'.$search.'%')->orWhere('details_ar', 'LIKE', '%'.$search.'%')->get();

        return view('frontend.pages.search_wise_post', compact('all_data', 'search'));
    }

    /**
     * Category Wise Post
     */
    public function categoryWisePost($id){
        $all_data = Post::where('category_id', $id)->where('status', true)->latest()->paginate(12);
        $category = Category::where('id', $id)->first();
        return view('frontend.pages.category_wise_post', compact('all_data', 'category'));
    }

    /**
     * Tag Wise Post
     */
    public function tagWisePost($id){
        $all_data = Post::where('tag_id', $id)->where('status', true)->latest()->paginate(12);
        $tag = Tag::where('id', $id)->first();
        return view('frontend.pages.tag_wise_post', compact('all_data', 'tag'));
    }

    /**
     * Category Wise Post
     */
    public function categoryWisePackage($id){
        $all_data = Package::where('category_id', $id)->where('status', true)->latest()->paginate(12);
        $category = Category::where('id', $id)->first();
        return view('frontend.pages.category_wise_package', compact('all_data', 'category'));
    }


    //============== Header ===============//
    /**
     * All Post
     */
    public function posts(){
        $all_data = Post::where('status', true)->latest()->paginate(12);
        return view('frontend.pages.all_post', compact('all_data'));
    }

    /**
     * All Package
     */
    public function packages(){
        $all_data = Package::where('status', true)->latest()->paginate(12);
        return view('frontend.pages.all_package', compact('all_data'));
    }

    /**
     * All Destination
     */
    public function destination(){
        $all_data = Destination::where('status', true)->latest()->paginate(12);
        return view('frontend.pages.all_destination', compact('all_data'));
    }

    /**
     * Search Package into Header Panel
     */
    public function headerSearchPackage(Request $request){
        $district_id = $request->district_id;
        $category_id = $request->category_id;
        $person = $request->person;
        $date = $request->date;
        $all_data = Package::where('district_id', $district_id)->orWhere('category_id', $category_id)->orWhere('created_at', $date)->where('status', true)->get();

        return view('frontend.pages.header_search_package', compact('all_data'));
    }

    /**
     * Subscriber Store
     */
    public function subscriberStore(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:subscribers'
        ]);

        Subscriber::create($request->all());

        $notification = [
            'message' => 'You Successfully Added to our Subscriber List :)',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
