<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Tag::latest()->get();
        return view('backend.tag.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required'
        ]);

        Tag::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar
        ]);

        $notification = [
            'message' => 'Tag Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('tag.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Tag::findOrFail($id);
        return view('backend.tag.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Tag::findOrFail($id);

        if($data){
            $this->validate($request, [
                'name_en' => 'required',
                'name_ar' => 'required'
            ]);

            $data->name_en = $request->name_en;
            $data->name_ar = $request->name_ar;
            $data->update();

            $notification = [
                'message' => 'Tag Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('tag.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Tag::findOrFail($id);

        if($data){

            $data->delete();

            $notification = [
                'message' => 'Tag Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);

        }

    }
}
