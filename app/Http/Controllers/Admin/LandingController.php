<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        return view('admin.landing.landing');
    }

     public function page2()
    {
        return view('admin.map.map');
    }

    public function page3()
    {
    return view('admin.map1.map1');
    }
}
