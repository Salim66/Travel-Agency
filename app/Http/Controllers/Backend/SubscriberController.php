<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Data List
     */
    public function list(){
        $all_data = Subscriber::latest()->get();
        return view('backend.subscriber.list', compact('all_data'));
    }

    /**
     * Data Delete
     */
    public function delete($id){
        Subscriber::findOrFail($id)->delete();

        $notification = [
            'message' => 'Subscriber User Deleted Successfully',
            'alert-type' => 'info'
        ];

        return redirect()->back()->with($notification);
    }
}
