<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Data list
     */
    public function list(){
        $all_data = Terms::latest()->get();
        return view('backend.term.list', compact('all_data'));
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

        Terms::create([
            'question_ar' => $request->question_ar,
            'question_en' => $request->question_en,
            'answer_en' => $request->answer_en,
            'answer_ar' => $request->answer_ar
        ]);

        $notification = [
            'message' => 'Terms Added Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('term.list')->with($notification);
    }

    /**
     * Data Edit
     */
    public function edit($id){
        $data = Terms::findOrFail($id);
        return view('backend.term.edit', compact('data'));
    }

    /**
     * Data Update
     */
    public function update(Request $request, $id){
        $data = Terms::findOrFail($id);

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
                'message' => 'Terms Updated Successfully',
                'alert-type' => 'info'
            ];

            return redirect()->route('term.list')->with($notification);

        }

    }

    /**
     * Data Delete
     */
    public function delete($id) {
        $data = Terms::findOrFail($id);

        if($data){

            $data->delete();

            $notification = [
                'message' => 'Terms Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }

    }

}
