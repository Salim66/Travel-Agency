<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BookPackage;
use Illuminate\Http\Request;

class BookingPackageController extends Controller
{
    /**
     * Pending Package List
     */
    public function pendingList(){
        $all_data = BookPackage::where('status', 0)->get();
        return view('backend.booking-package.pending_list', compact('all_data'));
    }
    /**
     * Completed Package List
     */
    public function CompletedList(){
        $all_data = BookPackage::where('status', 1)->get();
        return view('backend.booking-package.completed_list', compact('all_data'));
    }

    /**
     * Booking Package View
     */
    public function pendingPackageView($id){
        $data = BookPackage::findOrFail($id);
        return view('backend.booking-package.booking_single_package', compact('data'));
    }

    /**
     * Booking Package Completed
     */
    public function packageCompleted($id){

        BookPackage::findOrFail($id)->update(['status' => 1]);

        $notification = [
            'message' => 'Booking Package Completed Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Booking Package Pending
     */
    public function packagePending($id){

        BookPackage::findOrFail($id)->update(['status' => 0]);

        $notification = [
            'message' => 'Booking Package Pending Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Booking Package Delete
     */
    public function bookingPackagedelete($id){

        BookPackage::findOrFail($id)->delete();

        $notification = [
            'message' => 'Booking Package Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }
}
