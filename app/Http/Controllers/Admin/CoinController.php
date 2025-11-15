<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CoinController extends Controller
{
    public function index()
    {
        return view('admin.coin.coin');
    }
}
