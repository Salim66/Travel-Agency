<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Arabic Language
     */
    public function arabic(){
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'arabic');
        return redirect()->back();
    }


    /**
     * English Language
     */
    public function english(){
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }
}
