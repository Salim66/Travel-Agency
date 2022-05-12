<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Category::latest()->get();
        return view('backend.category.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
            'image' => 'required'
        ]);

        $image_unique_name = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/category'), $image_unique_name);
        }

        Category::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'image' => $image_unique_name
        ]);

        $notification = [
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('category.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Category::findOrFail($id);
        return view('backend.category.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Category::findOrFail($id);

        if($data){
            $this->validate($request, [
                'name_en' => 'required',
                'name_ar' => 'required'
            ]);

            $image_unique_name = '';
            if($request->hasFile('image')){
                $image = $request->file('image');
                $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/category'), $image_unique_name);
                if (file_exists('upload/category/'.$data -> image )){
                    unlink('upload/category/'.$data -> image);
                }
            }else {
                $image_unique_name = $data->image;
            }

            $data->name_en = $request->name_en;
            $data->name_ar = $request->name_ar;
            $data->image = $image_unique_name;
            $data->update();

            $notification = [
                'message' => 'Category Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('category.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Category::findOrFail($id);

        if($data){
            if (file_exists('upload/category/'.$data -> image )){
                unlink('upload/category/'.$data -> image);
            }

            $data->delete();

            $notification = [
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }
}
