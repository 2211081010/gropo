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
        $pengunjung = DB::table('pengunjung')
            ->join('member_sip', 'pengunjung.id_member_sip', '=', 'member_sip.id')
            ->join('metode_pembayarans', 'pengunjung.id_metode_pembayaran', '=', 'metode_pembayarans.id')
            ->join('lokasi', 'pengunjung.id_lokasi', '=', 'lokasi.id')
            ->join('petugas', 'pengunjung.id_petugas', '=', 'petugas.id')
            ->join('jenis_kendaraan', 'pengunjung.id_jenis_kendaraan', '=', 'jenis_kendaraan.id')
            ->select(
                'pengunjung.*',
                'member_sip.nama as nama_member',
                'metode_pembayarans.nama_metode',
                'lokasi.nama',
                'petugas.nama as nama_petugas',
                'jenis_kendaraan.jenis_kendaraan as jenis_kendaraan'
            )
            ->orderBy('pengunjung.id', 'DESC')
            ->get();

        return view('admin.pengunjung.index', ['pengunjung' => $pengunjung]);
    }

    // Form tambah
    public function add()
    {
        $member_sip = DB::table('member_sip')->get();
        $metode_pembayaran = DB::table('metode_pembayarans')->get();
        $lokasi = DB::table('lokasi')->get();
        $petugas = DB::table('petugas')->get();
        $jenis_kendaraan = DB::table('jenis_kendaraan')->get();

        return view('admin.pengunjung.tambah', [
            'member_sip' => $member_sip,
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
            'id_member_sip' => 'required|exists:member_sip,id',
            'id_metode_pembayaran' => 'required|exists:metode_pembayarans,id',
            'id_lokasi' => 'required|exists:lokasi,id',
            'id_petugas' => 'required|exists:petugas,id',
            'id_jenis_kendaraan' => 'required|exists:jenis_kendaraan,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'nopol' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'required|string',
        ]);

        // Upload file jika ada
        $bukti_pembayaran = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $filename = time().'_'.$file->getClientOriginalName();
            $bukti_pembayaran = $file->storeAs('bukti_pembayaran', $filename, 'public');
        }

        DB::table('pengunjung')->insert([
            'id_member_sip' => $request->id_member_sip,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'id_lokasi' => $request->id_lokasi,
            'id_petugas' => $request->id_petugas,
            'id_jenis_kendaraan' => $request->id_jenis_kendaraan,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'nopol' => $request->nopol,
            'bukti_pembayaran' => $bukti_pembayaran,
            'status' => $request->status,
        ]);

        return redirect('/admin/pengunjung')->with("success","Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $pengunjung = DB::table('pengunjung')->where('id', $id)->first();
        $member_sip = DB::table('member_sip')->get();
        $metode_pembayaran = DB::table('metode_pembayarans')->get();
        $lokasi = DB::table('lokasi')->get();
        $petugas = DB::table('petugas')->get();
        $jenis_kendaraan = DB::table('jenis_kendaraan')->get();

        return view('admin.pengunjung.edit', [
            'pengunjung' => $pengunjung,
            'member_sip' => $member_sip,
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
            'id_member_sip' => 'required|exists:member_sip,id',
            'id_metode_pembayaran' => 'required|exists:metode_pembayarans,id',
            'id_lokasi' => 'required|exists:lokasi,id',
            'id_petugas' => 'required|exists:petugas,id',
            'id_jenis_kendaraan' => 'required|exists:jenis_kendaraan,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'jam_keluar' => 'required',
            'nopol' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status' => 'required|string',
        ]);

        $data = [
            'id_member_sip' => $request->id_member_sip,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'id_lokasi' => $request->id_lokasi,
            'id_petugas' => $request->id_petugas,
            'id_jenis_kendaraan' => $request->id_jenis_kendaraan,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
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
            $filename = time().'_'.$file->getClientOriginalName();
            $data['bukti_pembayaran'] = $file->storeAs('bukti_pembayaran', $filename, 'public');
        }

        DB::table('pengunjung')->where('id', $id)->update($data);

        return redirect('/admin/pengunjung')->with("success","Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        $pengunjung = DB::table('pengunjung')->where('id', $id)->first();
        if ($pengunjung && $pengunjung->bukti_pembayaran) {
            Storage::disk('public')->delete($pengunjung->bukti_pembayaran);
        }

        DB::table('pengunjung')->where('id', $id)->delete();
        return redirect('/admin/pengunjung')->with("success","Data Berhasil Dihapus !");
    }
}
