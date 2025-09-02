<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MetodePembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampilkan semua metode pembayaran
    public function read()
    {
        $metode_pembayarans = DB::table('metode_pembayarans')
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.metode_pembayaran.index', [
            'metode_pembayarans' => $metode_pembayarans
        ]);
    }

    // Form tambah
    public function add()
    {
        return view('admin.metode_pembayaran.tambah');
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'nama_metode' => 'required|string|max:255',
        ]);

        DB::table('metode_pembayarans')->insert([
            'nama_metode' => $request->nama_metode,
        ]);

        return redirect('/admin/metode_pembayaran')
            ->with("success", "Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $metode_pembayaran = DB::table('metode_pembayarans')
            ->where('id', $id)
            ->first();

        if (!$metode_pembayaran) {
            return redirect('/admin/metode_pembayaran')
                ->with("error", "Data tidak ditemukan!");
        }

        return view('admin.metode_pembayaran.edit', [
            'metode_pembayaran' => $metode_pembayaran
        ]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_metode' => 'required|string|max:255',
        ]);

        DB::table('metode_pembayarans')
            ->where('id', $id)
            ->update([
                'nama_metode' => $request->nama_metode,
            ]);

        return redirect('/admin/metode_pembayaran')
            ->with("success", "Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        DB::table('metode_pembayarans')
            ->where('id', $id)
            ->delete();

        return redirect('/admin/metode_pembayaran')
            ->with("success", "Data Berhasil Dihapus !");
    }
}
