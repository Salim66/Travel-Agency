<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class PostController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Post::with(['categories', 'tags', 'users'])->latest()->get();
        return view('backend.post.list', compact('all_data'));
    }

    /**
     * Data Add
     */
    public function add(){
        return view('backend.post.add');
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'category_id' => 'required',
            'tag_id' => 'required',
            'title_en' => 'required',
            'title_ar' => 'required',
            'image' => 'required'
        ]);

        $save_url_i = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(770, 350)->save('upload/post/'. $image_unique_name);
            $save_url_i = 'upload/post/'.$image_unique_name;
        }



        Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'title_slug' => $this->getSlug($request->title_en),
            'image' => $save_url_i,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
            'date' => date('d-m-Y'),
        ]);

        $notification = [
            'message' => 'Post Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('post.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Post::findOrFail($id);
        return view('backend.post.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Post::findOrFail($id);

        if($data){
            $this->validate($request, [
                'category_id' => 'required',
                'tag_id' => 'required',
                'title_en' => 'required',
                'title_ar' => 'required',
            ]);

            $save_url_i = '';
            if($request->hasFile('image')){
                $image = $request->file('image');
                if (file_exists($data -> image )){
                    unlink($data -> image);
                }
                $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(770, 350)->save('upload/post/'. $image_unique_name);
                $save_url_i = 'upload/post/'.$image_unique_name;
            }else {
                $save_url_i = $data->image;
            }


             $data->user_id = Auth::user()->id;
             $data->category_id = $request->category_id;
             $data->tag_id = $request->tag_id;
             $data->title_en = $request->title_en;
             $data->title_ar = $request->title_ar;
             $data->title_slug = $this->getSlug($request->title_en);
             $data->image = $save_url_i;
             $data->details_en = $request->details_en;
             $data->details_ar = $request->details_ar;
             $data->date = date('d-m-Y');
             $data->update();

            $notification = [
                'message' => 'Post Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('post.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Post::findOrFail($id);

        if($data){
            if (file_exists($data -> image )){
                unlink($data -> image);
            }

            $data->delete();

            $notification = [
                'message' => 'Post Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }

    /**
     * Data Inactive
     */
    public function postInactive($id){

        Post::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Post Inactive Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data Active
     */
    public function postActive($id){

        Post::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Post Active Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Data view
     */
    public function postView($id){
        $post = Post::with(['categories', 'tags', 'users'])->where('id', $id)->first();
        return view('backend.post.single_post', compact('post'));
    }
}
