<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ContactInfo $contactInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = About::find(1);
        return view('backend.settings.about.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = About::findOrFail($id);

        $image_one = '';
        if($request->hasFile('image_one')){
            $image = $request->file('image_one');
            if (file_exists($data -> image_one )){
                unlink($data -> image_one);
            }
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(430, 290)->save('upload/about/'. $image_unique_name);
            $image_one = 'upload/about/'.$image_unique_name;
        }else {
            $image_one = $data->image_one;
        }

        $image_two = '';
        if($request->hasFile('image_two')){
            $image = $request->file('image_two');
            if (file_exists($data -> image_two )){
                unlink($data -> image_two);
            }
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 250)->save('upload/about/'. $image_unique_name);
            $image_two = 'upload/about/'.$image_unique_name;
        }else {
            $image_two = $data->image_two;
        }

        $image_three = '';
        if($request->hasFile('image_three')){
            $image = $request->file('image_three');
            if (file_exists($data -> image_three )){
                unlink($data -> image_three);
            }
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(270, 250)->save('upload/about/'. $image_unique_name);
            $image_three = 'upload/about/'.$image_unique_name;
        }else {
            $image_three = $data->image_three;
        }


        $data->image_one = $image_one;
        $data->image_two = $image_two;
        $data->image_three = $image_three;
        $data->yours_experience = $request->yours_experience;
        $data->your_guide = $request->your_guide;
        $data->travelar_connect = $request->travelar_connect;
        $data->description_en = $request->description_en;
        $data->description_ar = $request->description_ar;
        $data->update();

        $notification = [
            'message' => 'About Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactInfo $contactInfo)
    {
        //
    }
}
