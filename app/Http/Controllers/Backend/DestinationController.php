<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class DestinationController extends Controller
{
     /**
     * Data list
     */
    public function list(){
        $all_data = Destination::with('categories')->latest()->get();
        return view('backend.destination.list', compact('all_data'));
    }

    /**
     * Data Add
     */
    public function add(){
        return view('backend.destination.add');
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
            'number_of_place' => 'required',
            'number_of_hotal' => 'required',
            'image' => 'required'
        ]);

        $save_url_i = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 400)->save('upload/destination/'. $image_unique_name);
            $save_url_i = 'upload/destination/'.$image_unique_name;
        }



        Destination::create([
            'category_id' => $request->category_id,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'title_slug' => $this->getSlug($request->title_en),
            'number_of_place' => $request->number_of_place,
            'number_of_hotal' => $request->number_of_hotal,
            'rating' => $request->rating,
            'image' => $save_url_i,
            'destination_en' => $request->destination_en,
            'destination_ar' => $request->destination_ar,
            'departure_en' => $request->departure_en,
            'departure_ar' => $request->departure_ar,
            'departure_time' => $request->departure_time,
            'return_time' => $request->return_time,
            'detials_en' => $request->detials_en,
            'detials_ar' => $request->detials_ar,
            'destination_map_link' => $request->destination_map_link,
        ]);

        $notification = [
            'message' => 'Destination Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('destination.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Destination::findOrFail($id);
        return view('backend.destination.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Destination::findOrFail($id);

        if($data){
            $this->validate($request, [
                'category_id' => 'required',
                'title_en' => 'required',
                'title_ar' => 'required',
                'number_of_place' => 'required',
                'number_of_hotal' => 'required'
            ]);

            $save_url_i = '';
            if($request->hasFile('image')){
                $image = $request->file('image');
                if (file_exists($data -> image )){
                    unlink($data -> image);
                }
                $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(770, 400)->save('upload/destination/'. $image_unique_name);
                $save_url_i = 'upload/destination/'.$image_unique_name;
            }else {
                $save_url_i = $data->image;
            }


             $data->category_id = $request->category_id;
             $data->title_en = $request->title_en;
             $data->title_ar = $request->title_ar;
             $data->title_slug = $this->getSlug($request->title_en);
             $data->number_of_place = $request->number_of_place;
             $data->number_of_hotal = $request->number_of_hotal;
             $data->rating = $request->rating;
             $data->image = $save_url_i;
             $data->destination_en = $request->destination_en;
             $data->destination_ar = $request->destination_ar;
             $data->departure_en = $request->departure_en;
             $data->departure_ar = $request->departure_ar;
             $data->departure_time = $request->departure_time;
             $data->return_time = $request->return_time;
             $data->detials_en = $request->detials_en;
             $data->detials_ar = $request->detials_ar;
             $data->destination_map_link = $request->destination_map_link;
             $data->update();

            $notification = [
                'message' => 'Destination Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('destination.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Destination::findOrFail($id);

        if($data){
            if (file_exists($data -> image )){
                unlink($data -> image);
            }

            $data->delete();

            $notification = [
                'message' => 'Destination Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }

    /**
     * Data Inactive
     */
    public function destinationInactive($id){

        Destination::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Destination Inactive Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data Active
     */
    public function destinationActive($id){

        Destination::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Destination Active Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data view
     */
    public function destinationView($id){
        $categories = Category::latest()->get();
        $destination = Destination::with('categories')->where('id', $id)->first();
        return view('backend.destination.single_destination', compact('categories', 'destination'));
    }
}
