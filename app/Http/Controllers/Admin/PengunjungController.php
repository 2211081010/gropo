<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengunjungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampil semua pengunjung
    public function read()
    {
        $pengunjung = DB::table('pengunjung')->orderBy('id', 'DESC')->get();

        // Tambahkan data relasi manual
        foreach ($pengunjung as $p) {
            $p->nama_member = DB::table('member_ship')->where('id', $p->id_member_ship)->value('nama');
            $p->nama_metode = DB::table('metode_pembayarans')->where('id', $p->id_metode_pembayaran)->value('nama_metode');
            $p->nama_lokasi = DB::table('lokasi')->where('id', $p->id_lokasi)->value('nama');
            $p->nama_petugas = DB::table('petugas')->where('id', $p->id_petugas)->value('nama');
            $p->jenis_kendaraan = DB::table('jenis_kendaraan')->where('id', $p->id_jenis_kendaraan)->value('jenis_kendaraan');
        }

        return view('admin.pengunjung.index', ['pengunjung' => $pengunjung]);
    }

    // Form tambah
    public function add()
    {
        $member_ship = DB::table('member_ship')->get();
        $metode_pembayaran = DB::table('metode_pembayarans')->get();
        $lokasi = DB::table('lokasi')->get();
        $petugas = DB::table('petugas')->get();
        $jenis_kendaraan = DB::table('jenis_kendaraan')->get();

        return view('admin.pengunjung.tambah', [
            'member_ship' => $member_ship,
            'metode_pembayaran' => $metode_pembayaran,
            'lokasi' => $lokasi,
            'petugas' => $petugas,
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'id_member_ship' => 'required|exists:member_ship,id',
            'id_metode_pembayaran' => 'required|exists:metode_pembayarans,id',
            'id_lokasi' => 'required|exists:lokasi,id',
            'id_petugas' => 'required|exists:petugas,id',
            'id_jenis_kendaraan' => 'required|exists:jenis_kendaraan,id',
            'tanggal' => 'required|date',
            'nopol' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'required|string',
        ]);

        // Upload file jika ada
        $bukti_pembayaran = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $bukti_pembayaran = $file->storeAs('bukti_pembayaran', $filename, 'public');
        }

        DB::table('pengunjung')->insert([
            'id_member_ship' => $request->id_member_ship,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'id_lokasi' => $request->id_lokasi,
            'id_petugas' => $request->id_petugas,
            'id_jenis_kendaraan' => $request->id_jenis_kendaraan,
            'tanggal' => $request->tanggal,
            'nopol' => $request->nopol,
            'bukti_pembayaran' => $bukti_pembayaran,
            'status' => $request->status,
        ]);

        return redirect('/admin/pengunjung')->with("success", "Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $pengunjung = DB::table('pengunjung')->where('id', $id)->first();
        $member_ship = DB::table('member_ship')->get();
        $metode_pembayaran = DB::table('metode_pembayarans')->get();
        $lokasi = DB::table('lokasi')->get();
        $petugas = DB::table('petugas')->get();
        $jenis_kendaraan = DB::table('jenis_kendaraan')->get();

        return view('admin.pengunjung.edit', [
            'pengunjung' => $pengunjung,
            'member_ship' => $member_ship,
            'metode_pembayaran' => $metode_pembayaran,
            'lokasi' => $lokasi,
            'petugas' => $petugas,
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_member_ship' => 'required|exists:member_ship,id',
            'id_metode_pembayaran' => 'required|exists:metode_pembayarans,id',
            'id_lokasi' => 'required|exists:lokasi,id',
            'id_petugas' => 'required|exists:petugas,id',
            'id_jenis_kendaraan' => 'required|exists:jenis_kendaraan,id',
            'tanggal' => 'required|date',
            'nopol' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'required|string',
        ]);

        $data = [
            'id_member_ship' => $request->id_member_ship,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'id_lokasi' => $request->id_lokasi,
            'id_petugas' => $request->id_petugas,
            'id_jenis_kendaraan' => $request->id_jenis_kendaraan,
            'tanggal' => $request->tanggal,
            'nopol' => $request->nopol,
            'status' => $request->status,
        ];

        // Upload file jika ada
        if ($request->hasFile('bukti_pembayaran')) {
            $pengunjung = DB::table('pengunjung')->where('id', $id)->first();
            if ($pengunjung && $pengunjung->bukti_pembayaran) {
                Storage::disk('public')->delete($pengunjung->bukti_pembayaran);
            }
            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['bukti_pembayaran'] = $file->storeAs('bukti_pembayaran', $filename, 'public');
        }

        DB::table('pengunjung')->where('id', $id)->update($data);

        return redirect('/admin/pengunjung')->with("success", "Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        $pengunjung = DB::table('pengunjung')->where('id', $id)->first();
        if ($pengunjung && $pengunjung->bukti_pembayaran) {
            Storage::disk('public')->delete($pengunjung->bukti_pembayaran);
        }

        DB::table('pengunjung')->where('id', $id)->delete();
        return redirect('/admin/pengunjung')->with("success", "Data Berhasil Dihapus !");
    }
}
