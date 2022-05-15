<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Country;
use App\Models\Package;
use App\Models\Category;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Package::with('categories', 'countries', 'districts')->latest()->get();
        return view('backend.packages.list', compact('all_data'));
    }

    /**
     * Data Add
     */
    public function add(){
        return view('backend.packages.add');
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'country_id' => 'required',
            'district_id' => 'required',
            'package_title_en' => 'required',
            'package_title_ar' => 'required',
            'package_duration' => 'required',
            'package_amount' => 'required',
            'package_image' => 'required'
        ]);

        $save_url = '';
        if($request->hasFile('package_image')){
            $image = $request->file('package_image');
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 410)->save('upload/package/'. $image_unique_name);
            $save_url = 'upload/package/'.$image_unique_name;
        }

        //post gallery image
        $gallery_image_u_n = [];
        $gallery_image = $request->hasFile('package_tour_gallery');
        if($gallery_image != NULL){
            $g_image = $request->file('package_tour_gallery');
            foreach ($g_image as $image){
                $gallery_image_unique_name = md5(time().rand()) .'.'. $image->getClientOriginalExtension();
                // get extension
                $extension = pathinfo($gallery_image_unique_name, PATHINFO_EXTENSION);
                $valid_extesion = array('jpg', 'jpeg', 'png', 'gif');
                if(in_array($extension, $valid_extesion)){
                    Image::make($image)->resize(370, 263)->save('upload/package/gallery/'. $gallery_image_unique_name);
                    $save_url = 'upload/package/gallery/'.$gallery_image_unique_name;
                    array_push($gallery_image_u_n, $save_url);
                }else {
                    return response()->json([
                        'error' => 'Invalid file format! '
                    ]);
                }
            }
        }

        Package::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'country_id' => $request->country_id,
            'district_id' => $request->district_id,
            'package_title_en' => $request->package_title_en,
            'package_title_ar' => $request->package_title_ar,
            'package_duration' => $request->package_duration,
            'package_amount' => $request->package_amount,
            'package_group_size' => $request->package_group_size,
            'package_tour_guide' => $request->package_tour_guide,
            'package_rating' => $request->package_rating,
            'package_image' => $save_url,
            'package_tour_gallery' => json_encode($gallery_image_u_n),
            'information_details_en' => $request->information_details_en,
            'information_details_ar' => $request->information_details_ar,
            'destination_en' => $request->destination_en,
            'destination_ar' => $request->destination_ar,
            'depature_en' => $request->depature_en,
            'depature_ar' => $request->depature_ar,
            'departure_time' => $request->departure_time,
            'return_time' => $request->return_time,
            'included_en' => $request->included_en,
            'included_ar' => $request->included_ar,
            'excluded_en' => $request->excluded_en,
            'excluded_ar' => $request->excluded_ar,
            'travel_with_en' => $request->travel_with_en,
            'travel_with_ar' => $request->travel_with_ar,
            'package_travel_plan_detials_en' => $request->package_travel_plan_detials_en,
            'package_travel_plan_detials_ar' => $request->package_travel_plan_detials_ar,
            'package_location_link' => $request->package_location_link,
            'package_holiday_offer' => $request->package_holiday_offer
        ]);

        $notification = [
            'message' => 'Package Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('package.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Package::findOrFail($id);
        return view('backend.packages.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Package::findOrFail($id);

        if($data){
            $this->validate($request, [
                'category_id' => 'required',
                'country_id' => 'required',
                'district_id' => 'required',
                'package_title_en' => 'required',
                'package_title_ar' => 'required',
                'package_duration' => 'required',
                'package_amount' => 'required'
            ]);

            $save_url_i = '';
            if($request->hasFile('package_image')){
                $image = $request->file('package_image');
                if (file_exists($data -> package_image )){
                    unlink($data -> package_image);
                }
                $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(770, 410)->save('upload/package/'. $image_unique_name);
                $save_url_i = 'upload/package/'.$image_unique_name;
            }else {
                $save_url_i = $data->package_image;
            }

            $all_gallery = json_decode($data->package_tour_gallery);

             //Package gallery
             $gallery_unique_name_u = [];
             if ($request->hasFile('package_tour_gallery')) {
                 $images = $request->file('package_tour_gallery');
                 foreach ($images as $image) {
                     $gallery_unique_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
                     $extension = pathinfo($gallery_unique_name, PATHINFO_EXTENSION);
                     $valid_extension = array('jpg', 'jpeg', 'png', 'gif');
                     if (in_array($extension, $valid_extension)) {
                         Image::make($image)->resize(370, 263)->save('upload/package/gallery/'. $gallery_unique_name);
                         $save_url = 'upload/package/gallery/'.$gallery_unique_name;
                         array_push($gallery_unique_name_u, $save_url);
                     } else {
                         return response()->json([
                             'error' => 'Invalid file format! '
                         ]);
                     }

                     if($all_gallery != null){
                        foreach ($all_gallery as $gallery){
                            if (file_exists($gallery) && !empty($gallery)) {
                                unlink($gallery);
                            }
                        }
                     }
                 }
             } else {
                 $gallery_unique_name_u = $data->package_tour_gallery;
             }


             $data->user_id = Auth::user()->id;
             $data->category_id = $request->category_id;
             $data->country_id = $request->country_id;
             $data->district_id = $request->district_id;
             $data->package_title_en = $request->package_title_en;
             $data->package_title_ar = $request->package_title_ar;
             $data->package_duration = $request->package_duration;
             $data->package_amount = $request->package_amount;
             $data->package_group_size = $request->package_group_size;
             $data->package_tour_guide = $request->package_tour_guide;
             $data->package_rating = $request->package_rating;
             $data->package_image = $save_url_i;
             $data->package_tour_gallery = $gallery_unique_name_u;
             $data->information_details_en = $request->information_details_en;
             $data->information_details_ar = $request->information_details_ar;
             $data->destination_en = $request->destination_en;
             $data->destination_ar = $request->destination_ar;
             $data->depature_en = $request->depature_en;
             $data->depature_ar = $request->depature_ar;
             $data->departure_time = $request->departure_time;
             $data->return_time = $request->return_time;
             $data->included_en = $request->included_en;
             $data->included_ar = $request->included_ar;
             $data->excluded_en = $request->excluded_en;
             $data->excluded_ar = $request->excluded_ar;
             $data->travel_with_en = $request->travel_with_en;
             $data->travel_with_ar = $request->travel_with_ar;
             $data->package_travel_plan_detials_en = $request->package_travel_plan_detials_en;
             $data->package_travel_plan_detials_ar = $request->package_travel_plan_detials_ar;
             $data->package_location_link = $request->package_location_link;
             $data->package_holiday_offer = $request->package_holiday_offer;
             $data->update();

            $notification = [
                'message' => 'Package Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('package.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Package::findOrFail($id);

        if($data){
            if (file_exists($data -> package_image )){
                unlink($data -> package_image);
            }

            $all_gallery = json_decode($data->package_tour_gallery);

            if($all_gallery != null){
                foreach ($all_gallery as $gallery){
                    if (file_exists($gallery) && !empty($gallery)) {
                        unlink($gallery);
                    }
                }
             }

            $data->delete();

            $notification = [
                'message' => 'Package Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }

    /**
     * Data Inactive
     */
    public function packageInactive($id){

        Package::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Package Inactive Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data Active
     */
    public function packageActive($id){

        Package::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Package Active Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data view
     */
    public function packageView($id){
        $categories = Category::latest()->get();
        $countries = Country::latest()->get();
        $districts = District::latest()->get();
        $package = Package::with(['countries', 'categories', 'districts'])->where('id', $id)->first();
        return view('backend.packages.single_package', compact('categories', 'countries', 'districts', 'package'));
    }
}
