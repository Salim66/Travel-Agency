<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = District::with('countries')->latest()->get();
        return view('backend.country.district.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'country_id' => 'required',
            'district_name_en' => 'required',
            'district_name_ar' => 'required'
        ]);

        District::create([
            'country_id' => $request->country_id,
            'district_name_en' => $request->district_name_en,
            'district_name_ar' => $request->district_name_ar
        ]);

        $notification = [
            'message' => 'District Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('district.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = District::findOrFail($id);
        return view('backend.country.district.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = District::findOrFail($id);

        if($data){
            $this->validate($request, [
                'country_id' => 'required',
                'district_name_en' => 'required',
                'district_name_ar' => 'required'
            ]);

            $data->country_id = $request->country_id;
            $data->district_name_en = $request->district_name_en;
            $data->district_name_ar = $request->district_name_ar;
            $data->update();

            $notification = [
                'message' => 'District Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('district.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {

        District::where('id', $id)->delete();

        $notification = [
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
