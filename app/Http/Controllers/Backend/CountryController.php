<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Country::latest()->get();
        return view('backend.country.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'country_name_en' => 'required',
            'country_name_ar' => 'required'
        ]);

        Country::create([
            'country_name_en' => $request->country_name_en,
            'country_name_ar' => $request->country_name_ar
        ]);

        $notification = [
            'message' => 'Country Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('country.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Country::findOrFail($id);
        return view('backend.country.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Country::findOrFail($id);

        if($data){
            $this->validate($request, [
                'country_name_en' => 'required',
                'country_name_ar' => 'required'
            ]);

            $data->country_name_en = $request->country_name_en;
            $data->country_name_ar = $request->country_name_ar;
            $data->update();

            $notification = [
                'message' => 'Country Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('country.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {

        Country::where('id', $id)->delete();

        $notification = [
            'message' => 'Country Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
