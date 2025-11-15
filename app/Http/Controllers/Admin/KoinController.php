<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class KoinController extends Controller
{
    public function index()
    {
        return view('admin.koin.koin');
    }
}
