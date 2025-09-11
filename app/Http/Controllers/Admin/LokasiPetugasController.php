<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LokasiPetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampil semua lokasi_petugas
    public function read()
    {
        $lokasi_petugas = DB::table('lokasi_petugas')
            ->join('lokasi', 'lokasi_petugas.id_lokasi', '=', 'lokasi.id')
            ->join('petugas', 'lokasi_petugas.id_petugas', '=', 'petugas.id')
            ->select(
                'lokasi_petugas.*',
                'lokasi.nama as nama_lokasi',
                'petugas.nama as nama_petugas'
            )
            ->orderBy('lokasi_petugas.id', 'DESC')
            ->get();

        return view('admin.lokasi_petugas.index', [
            'lokasi_petugas' => $lokasi_petugas
        ]);
    }

    // Form tambah
    public function add()
    {
        $lokasi = DB::table('lokasi')->orderBy('nama', 'ASC')->get();
        $petugas = DB::table('petugas')->orderBy('nama', 'ASC')->get();

        return view('admin.lokasi_petugas.tambah', [
            'lokasi' => $lokasi,
            'petugas' => $petugas
        ]);
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:lokasi,id',
            'id_petugas' => 'required|exists:petugas,id',
        ]);

        DB::table('lokasi_petugas')->insert([
            'id_lokasi' => $request->id_lokasi,
            'id_petugas' => $request->id_petugas,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/admin/lokasi_petugas')->with("success","Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $lokasi_petugas = DB::table('lokasi_petugas')->where('id', $id)->first();
        $lokasi = DB::table('lokasi')->orderBy('nama', 'ASC')->get();
        $petugas = DB::table('petugas')->orderBy('nama', 'ASC')->get();

        return view('admin.lokasi_petugas.edit', [
            'lokasi_petugas' => $lokasi_petugas,
            'lokasi' => $lokasi,
            'petugas' => $petugas
        ]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:lokasi,id',
            'id_petugas' => 'required|exists:petugas,id',
        ]);

        DB::table('lokasi_petugas')->where('id', $id)->update([
            'id_lokasi' => $request->id_lokasi,
            'id_petugas' => $request->id_petugas,
            'updated_at' => now(),
        ]);

        return redirect('/admin/lokasi_petugas')->with("success","Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        DB::table('lokasi_petugas')->where('id', $id)->delete();
        return redirect('/admin/lokasi_petugas')->with("success","Data Berhasil Dihapus !");
    }
}
