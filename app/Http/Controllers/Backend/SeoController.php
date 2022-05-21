<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;
use Image;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seo::findOrFail(1);
        return view('backend.settings.seo.list', [
            'data' => $data
        ]);
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
    public function edit($id)
    {
        $data = Seo::find($id);
        return view('backend.settings.seo.edit', compact('data'));
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
        $data = Seo::findOrFail($id);

        $logo = '';
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            if (file_exists($data -> logo )){
                unlink($data -> logo);
            }
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(202, 26)->save('upload/logo/'. $image_unique_name);
            $logo = 'upload/logo/'.$image_unique_name;
        }else {
            $logo = $data->logo;
        }

        $favicon = '';
        if($request->hasFile('favicon')){
            $image = $request->file('favicon');
            if (file_exists($data -> favicon )){
                unlink($data -> favicon);
            }
            $image_unique_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(36, 26)->save('upload/favicon/'. $image_unique_name);
            $favicon = 'upload/favicon/'.$image_unique_name;
        }else {
            $favicon = $data->favicon;
        }

        $data->meta_title = $request->meta_title;
        $data->meta_author = $request->meta_author;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->google_analytics = $request->google_analytics;
        $data->footer_description = $request->footer_description;
        $data->logo = $logo;
        $data->favicon = $favicon;
        $data->update();

        $notification = [
            'message' => 'SEO Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('seo.list')->with($notification);

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
