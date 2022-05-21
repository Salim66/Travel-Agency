<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Reviewer;
use Illuminate\Http\Request;
use Image;

class ReviewerController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Reviewer::latest()->get();
        return view('backend.reviewer.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'rating' => 'required',
            'message' => 'required',
            'image' => 'required'
        ]);

        $save_url_i = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 320)->save('upload/reviewer/'. $image_unique_name);
            $save_url_i = 'upload/reviewer/'.$image_unique_name;
        }



        Reviewer::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'message' => $request->message,
            'image' => $save_url_i,
        ]);

        $notification = [
            'message' => 'Reviewer Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('reviewer.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Reviewer::findOrFail($id);
        return view('backend.reviewer.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Reviewer::findOrFail($id);

        if($data){
            $this->validate($request, [
                'name' => 'required',
                'rating' => 'required',
                'message' => 'required'
            ]);

            $save_url_i = '';
            if($request->hasFile('image')){
                $image = $request->file('image');
                if (file_exists($data -> image )){
                    unlink($data -> image);
                }
                $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(370, 320)->save('upload/reviewer/'. $image_unique_name);
                $save_url_i = 'upload/reviewer/'.$image_unique_name;
            }else {
                $save_url_i = $data->image;
            }


             $data->name = $request->name;
             $data->rating = $request->rating;
             $data->message = $request->message;
             $data->image = $save_url_i;
             $data->update();

            $notification = [
                'message' => 'Reviewer Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('reviewer.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Reviewer::findOrFail($id);

        if($data){
            if (file_exists($data -> image )){
                unlink($data -> image);
            }

            $data->delete();

            $notification = [
                'message' => 'Reviewer Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }

    /**
     * Data Inactive
     */
    public function reviewerInactive($id){

        Reviewer::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Reviewer Inactive Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data Active
     */
    public function reviewerActive($id){

        Reviewer::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Reviewer Active Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
