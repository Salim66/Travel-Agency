<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Image;

class HeroSliderController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = HeroSlider::latest()->get();
        return view('backend.settings.banner.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'hero_title_en' => 'required',
            'hero_title_ar' => 'required',
            'hero_short_des_en' => 'required',
            'hero_short_des_ar' => 'required',
            'hero_banner' => 'required'
        ]);

        $save_url = '';
        if($request->hasFile('hero_banner')){
            $image = $request->file('hero_banner');
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(960, 750)->save('upload/banner/'. $image_unique_name);
            $save_url = 'upload/banner/'.$image_unique_name;
        }

        HeroSlider::create([
            'hero_title_en' => $request->hero_title_en,
            'hero_title_ar' => $request->hero_title_ar,
            'hero_short_des_en' => $request->hero_short_des_en,
            'hero_short_des_ar' => $request->hero_short_des_ar,
            'hero_banner' => $save_url
        ]);

        $notification = [
            'message' => 'Hero Banner Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('banner.list')->with($notification);
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
