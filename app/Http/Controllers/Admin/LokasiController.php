<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampil semua lokasi
    public function read()
    {
        $lokasi = DB::table('lokasi')->orderBy('id', 'DESC')->get();
        return view('admin.lokasi.index', compact('lokasi'));
    }

    // Form tambah
    public function add()
    {
        return view('admin.lokasi.tambah');
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'alamat'    => 'required|string|max:255',
            'koordinat' => 'required|string|max:255',
            'foto'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('foto')->store('foto_lokasi', 'public');

        DB::table('lokasi')->insert([
            'nama'       => $request->nama,
            'alamat'     => $request->alamat,
            'koordinat'  => $request->koordinat,
            'foto'       => $path, // hanya simpan relative path
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/admin/lokasi')->with("success", "Data berhasil ditambahkan!");
    }

    // Form edit
    public function edit($id)
    {
        $lokasi = DB::table('lokasi')->find($id);
        if (!$lokasi) {
            return redirect('/admin/lokasi')->with("error", "Data tidak ditemukan!");
        }
        return view('admin.lokasi.edit', compact('lokasi'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'alamat'    => 'required|string|max:255',
            'koordinat' => 'required|string|max:255',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $lokasi = DB::table('lokasi')->find($id);
        if (!$lokasi) {
            return redirect('/admin/lokasi')->with("error", "Data tidak ditemukan!");
        }

        $data = [
            'nama'       => $request->nama,
            'alamat'     => $request->alamat,
            'koordinat'  => $request->koordinat,
            'updated_at' => now(),
        ];

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($lokasi->foto && Storage::disk('public')->exists($lokasi->foto)) {
                Storage::disk('public')->delete($lokasi->foto);
            }

            // simpan foto baru
            $data['foto'] = $request->file('foto')->store('foto_lokasi', 'public');
        }

        DB::table('lokasi')->where('id', $id)->update($data);

        return redirect('/admin/lokasi')->with("success", "Data berhasil diupdate!");
    }

    // Hapus data
    public function delete($id)
    {
        $lokasi = DB::table('lokasi')->find($id);
        if (!$lokasi) {
            return redirect('/admin/lokasi')->with("error", "Data tidak ditemukan!");
        }

        if ($lokasi->foto && Storage::disk('public')->exists($lokasi->foto)) {
            Storage::disk('public')->delete($lokasi->foto);
        }

        DB::table('lokasi')->where('id', $id)->delete();

        return redirect('/admin/lokasi')->with("success", "Data berhasil dihapus!");
    }
}
