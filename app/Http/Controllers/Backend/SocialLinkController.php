<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SocialLink::findOrFail(1);
        return view('backend.settings.social-link.list', [
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
     * @param  \App\Models\SocialLink  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $contactInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialLink  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = SocialLink::find($id);
        return view('backend.settings.social-link.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialLink  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = SocialLink::findOrFail($id);

        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->twitter = $request->twitter;
        $data->whatsapp = $request->whatsapp;
        $data->pintarest = $request->pintarest;
        $data->update();

        $notification = [
            'message' => 'Social Link Updated Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('social.link')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialLink  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $contactInfo)
    {
        //
    }
}
