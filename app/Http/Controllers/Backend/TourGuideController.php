<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TourGuide;
use Illuminate\Http\Request;
use Image;

class TourGuideController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = TourGuide::latest()->get();
        return view('backend.tour-guide.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required'
        ]);

        $save_url_i = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 280)->save('upload/guide/'. $image_unique_name);
            $save_url_i = 'upload/guide/'.$image_unique_name;
        }



        TourGuide::create([
            'name' => $request->name,
            'image' => $save_url_i,
            'instagram_link' => $request->instagram_link,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'whatsapp_number' => $request->whatsapp_number,
        ]);

        $notification = [
            'message' => 'Tour Guide Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('guide.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = TourGuide::findOrFail($id);
        return view('backend.tour-guide.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = TourGuide::findOrFail($id);

        if($data){
            $this->validate($request, [
                'name' => 'required'
            ]);

            $save_url_i = '';
            if($request->hasFile('image')){
                $image = $request->file('image');
                if (file_exists($data -> image )){
                    unlink($data -> image);
                }
                $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(370, 280)->save('upload/guide/'. $image_unique_name);
                $save_url_i = 'upload/guide/'.$image_unique_name;
            }else {
                $save_url_i = $data->image;
            }


             $data->name = $request->name;
             $data->image = $save_url_i;
             $data->instagram_link = $request->instagram_link;
             $data->facebook_link = $request->facebook_link;
             $data->twitter_link = $request->twitter_link;
             $data->whatsapp_number = $request->whatsapp_number;
             $data->update();

            $notification = [
                'message' => 'Tour Guide Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('guide.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = TourGuide::findOrFail($id);

        if($data){
            if (file_exists($data -> image )){
                unlink($data -> image);
            }

            $data->delete();

            $notification = [
                'message' => 'Tour Guide Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }

    /**
     * Data Inactive
     */
    public function guideInactive($id){

        TourGuide::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Tour Guide Inactive Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data Active
     */
    public function guideActive($id){

        TourGuide::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Tour Guide Active Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
