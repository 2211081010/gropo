<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PoskoController extends Controller
{
    public function index()
    {
        return view('admin.posko.posko');
    }
}
