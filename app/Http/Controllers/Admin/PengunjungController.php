<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengujungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampil semua pengunjung dengan join
    public function read()
    {
        $pengunjung = DB::table('pengujung')
            ->join('member_sip', 'pengujung.id_member', '=', 'member_sip.id')
            ->join('metode_pembayaran', 'pengujung.id_metode_pembayaran', '=', 'metode_pembayaran.id')
            ->select(
                'pengujung.*',
                'member_sip.nama_member',
                'metode_pembayaran.nama_metode'
            )
            ->orderBy('pengujung.id', 'DESC')
            ->get();

        return view('admin.pengujung.index', ['pengunjung' => $pengunjung]);
    }

    // Form tambah
    public function add()
    {
        $members = DB::table('member_sip')->get();
        $metodes = DB::table('metode_pembayaran')->get();

        return view('admin.pengujung.tambah', [
            'members' => $members,
            'metodes' => $metodes
        ]);
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'id_member' => 'required|exists:member_sip,id',
            'id_metode_pembayaran' => 'required|exists:metode_pembayaran,id',
            'tanggal' => 'required|string|max:255',
            'jam_masuk' => 'required|string|max:255',
            'jam_keluar' => 'required|string|max:255',
            'nopol' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        DB::table('pengujung')->insert([
            'id_member' => $request->id_member,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'nopol' => $request->nopol,
            'bukti_pembayaran' => $request->bukti_pembayaran,
            'status' => $request->status,
        ]);

        return redirect('/admin/pengujung')->with("success","Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $pengunjung = DB::table('pengujung')->where('id', $id)->first();
        $members = DB::table('member_sip')->get();
        $metodes = DB::table('metode_pembayaran')->get();

        return view('admin.pengujung.edit', [
            'pengunjung' => $pengunjung,
            'members' => $members,
            'metodes' => $metodes
        ]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_member' => 'required|exists:member_sip,id',
            'id_metode_pembayaran' => 'required|exists:metode_pembayaran,id',
            'tanggal' => 'required|string|max:255',
            'jam_masuk' => 'required|string|max:255',
            'jam_keluar' => 'required|string|max:255',
            'nopol' => 'required|string|max:255',
            'bukti_pembayaran' => 'nullable|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $data = [
            'id_member' => $request->id_member,
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'nopol' => $request->nopol,
            'bukti_pembayaran' => $request->bukti_pembayaran,
            'status' => $request->status,
        ];

        DB::table('pengujung')->where('id', $id)->update($data);

        return redirect('/admin/pengujung')->with("success","Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        $pengunjung = DB::table('pengujung')->where('id', $id)->first();
        if ($pengunjung && $pengunjung->foto) {
            Storage::disk('public')->delete($pengunjung->foto);
        }

        DB::table('pengujung')->where('id', $id)->delete();
        return redirect('/admin/pengujung')->with("success","Data Berhasil Dihapus !");
    }
}
