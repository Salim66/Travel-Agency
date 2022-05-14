<?php

namespace App\Http\Controllers\Backend;

use Image;
use App\Models\Package;
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
        $data = HeroSlider::findOrFail($id);
        return view('backend.settings.banner.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = HeroSlider::findOrFail($id);

        if($data){
            $this->validate($request, [
                'hero_title_en' => 'required',
                'hero_title_ar' => 'required',
                'hero_short_des_en' => 'required',
                'hero_short_des_ar' => 'required'
            ]);

            $save_url = '';
            if($request->hasFile('hero_banner')){
                $image = $request->file('hero_banner');
                if (file_exists($data -> hero_banner )){
                    unlink($data -> hero_banner);
                }
                $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(960, 750)->save('upload/banner/'. $image_unique_name);
                $save_url = 'upload/banner/'.$image_unique_name;
            }else {
                $save_url = $data->hero_banner;
            }

            $data->hero_title_en = $request->hero_title_en;
            $data->hero_title_ar = $request->hero_title_ar;
            $data->hero_short_des_en = $request->hero_short_des_en;
            $data->hero_short_des_ar = $request->hero_short_des_ar;
            $data->hero_banner = $save_url;
            $data->update();

            $notification = [
                'message' => 'Hero Banner Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('banner.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = HeroSlider::findOrFail($id);

        if($data){
            if (file_exists($data -> hero_banner )){
                unlink($data -> hero_banner);
            }

            $data->delete();

            $notification = [
                'message' => 'Hero Banner Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }
}
