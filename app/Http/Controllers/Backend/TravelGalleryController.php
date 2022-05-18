<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TravelGallery;
use Illuminate\Http\Request;
use Image;

class TravelGalleryController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = TravelGallery::latest()->get();
        return view('backend.travel-gallery.list', compact('all_data'));
    }

    /**
     * Data Add
     */
    public function add(){
        return view('backend.travel-gallery.add');
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $save_url_i = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 270)->save('upload/gallery/'. $image_unique_name);
            $save_url_i = 'upload/gallery/'.$image_unique_name;
        }



        TravelGallery::create([
            'image' => $save_url_i,
        ]);

        $notification = [
            'message' => 'Travel Gallery Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('gallery.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = TravelGallery::findOrFail($id);
        return view('backend.travel-gallery.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = TravelGallery::findOrFail($id);

        if($data){
            $this->validate($request, [
                'image' => 'required'
            ]);

            $save_url_i = '';
            if($request->hasFile('image')){
                $image = $request->file('image');
                if (file_exists($data -> image )){
                    unlink($data -> image);
                }
                $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(370, 270)->save('upload/gallery/'. $image_unique_name);
                $save_url_i = 'upload/gallery/'.$image_unique_name;
            }else {
                $save_url_i = $data->image;
            }


             $data->image = $save_url_i;
             $data->update();

            $notification = [
                'message' => 'Travel Gallery Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('gallery.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = TravelGallery::findOrFail($id);

        if($data){
            if (file_exists($data -> image )){
                unlink($data -> image);
            }

            $data->delete();

            $notification = [
                'message' => 'Travel Gallery Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }

    /**
     * Data Inactive
     */
    public function galleryInactive($id){

        TravelGallery::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Travel Gallery Inactive Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data Active
     */
    public function galleryActive($id){

        TravelGallery::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Travel Gallery Active Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

}
