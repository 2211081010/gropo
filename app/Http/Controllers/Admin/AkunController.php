<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        // contoh: ambil user dari Auth, atau pakai dummy object seperti sebelumnya
        // $userModel = Auth::user();

        // contoh object user sementara (ganti dengan data asli dari DB/Auth)
        $user = (object) [
            'username' => 'minggu12',
            'email'    => 'minggesut3@gmail.com',
            'nomor'    => '0895897988987',
            'saldo'    => 0,
        ];

        // Pastikan properti tingkatan selalu diset berdasarkan logika yang diinginkan
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

        return view('admin.akun.akun', compact('user'));
    }

    public function store(Request $request)
    {
        // contoh simpan / proses
        return back()->with('success', 'Data berhasil disimpan');
    }
}
