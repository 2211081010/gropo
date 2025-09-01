<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JenisKendaraanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampil semua jenis_kendaraan
    public function read()
    {
        $jenis_kendaraan = DB::table('jenis_kendaraan')->orderBy('id','DESC')->get();
        return view('admin.jenis_kendaraan.index', ['jenis_kendaraan' => $jenis_kendaraan]);
    }

    // Form tambah
    public function add()
    {
        return view('admin.jenis_kendaraan.tambah');
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required|string|max:255',
            'tarif' => 'required|string|max:255',
            //'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        //$path = $request->file('foto')->store('foto_jenis_kendaraan', 'public');

        DB::table('jenis_kendaraan')->insert([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif' => $request->tarif,
            //'foto' => $path
        ]);

        return redirect('/admin/jenis_kendaraan')->with("success","Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $jenis_kendaraan = DB::table('jenis_kendaraan')->where('id', $id)->first();
        return view('admin.jenis_kendaraan.edit', ['jenis_kendaraan' => $jenis_kendaraan]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kendaraan' => 'required|string|max:255',
            'tarif' => 'required|string|max:255',
        ]);

        $data = ['jenis_kendaraan' => $request->jenis_kendaraan];
        $data = ['tarif' => $request->tarif];


        DB::table('jenis_kendaraan')->where('id', $id)->update($data);

        return redirect('/admin/jenis_kendaraan')->with("success","Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        $jenis_kendaraan = DB::table('jenis_kendaraan')->where('id', $id)->first();
        if ($jenis_kendaraan && $jenis_kendaraan->foto) {
            Storage::disk('public')->delete($jenis_kendaraan->foto);
        }

        DB::table('jenis_kendaraan')->where('id', $id)->delete();
        return redirect('/admin/jenis_kendaraan')->with("success","Data Berhasil Dihapus !");
    }
}
