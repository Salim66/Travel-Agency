<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Policy::latest()->get();
        return view('backend.policy.list', compact('all_data'));
    }

    /**
     * Data Store
     */
    public function store(Request $request){
        $this->validate($request, [
            'question_ar' => 'required',
            'question_en' => 'required',
            'answer_en' => 'required',
            'answer_ar' => 'required'
        ]);

        Policy::create([
            'question_ar' => $request->question_ar,
            'question_en' => $request->question_en,
            'answer_en' => $request->answer_en,
            'answer_ar' => $request->answer_ar
        ]);

        $notification = [
            'message' => 'Policy Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('policy.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Policy::findOrFail($id);
        return view('backend.policy.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Policy::findOrFail($id);

        if($data){
            $this->validate($request, [
                'question_ar' => 'required',
                'question_en' => 'required',
                'answer_en' => 'required',
                'answer_ar' => 'required'
            ]);

             $data->question_ar = $request->question_ar;
             $data->question_en = $request->question_en;
             $data->answer_en = $request->answer_en;
             $data->answer_ar = $request->answer_ar;
             $data->update();

            $notification = [
                'message' => 'Policy Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('policy.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Policy::findOrFail($id);

        if($data){

            $data->delete();

            $notification = [
                'message' => 'Policy Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }
}
