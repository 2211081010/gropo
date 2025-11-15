<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Akun2Controller extends Controller
{
    public function index()
    {
        // Ambil user dari Auth atau dummy
        //  $userModel = Auth::user();

        // Dummy object sementara (ganti dengan data asli dari DB/Auth)
        $user = (object) [
            'email'    => 'user@example.com',
            'saldo'    => 5,
            'exp'      => 3,  // EXP saat ini
            'expMax'   => 100, // EXP maksimum untuk level ini
        ];

        // Tentukan tingkatan berdasarkan saldo
        if (!isset($user->tingkatan)) {
            if ($user->saldo >= 1000000) {
                $user->tingkatan = 'Platinum';
            } elseif ($user->saldo >= 500000) {
                $user->tingkatan = 'Gold';
            } elseif ($user->saldo >= 100000) {
                $user->tingkatan = 'Silver';
            } else {
                $user->tingkatan = 'Bronze';
            }
        }

        return view('admin.akun2.akun2', compact('user'));
    }

    public function store(Request $request)
    {
        // Contoh simpan / proses
        return back()->with('success', 'Data berhasil disimpan');
    }
}
