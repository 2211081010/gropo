<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KendaraanMemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampil semua kendaraan_member
    public function read()
    {
        $kendaraan_member = DB::table('kendaraan_member')
            ->join('member_ship', 'kendaraan_member.id_member_ship', '=', 'member_ship.id')
            ->join('jenis_kendaraan', 'kendaraan_member.id_jenis_kendaraan', '=', 'jenis_kendaraan.id')
            ->select(
                'kendaraan_member.*',
                'member_ship.nama as nama_member',
                'jenis_kendaraan.jenis_kendaraan as nama_jenis_kendaraan'
            )
            ->orderBy('kendaraan_member.id', 'DESC')
            ->get();

        return view('admin.kendaraan_member.index', [
            'kendaraan_member' => $kendaraan_member
        ]);
    }

    // Form tambah
    public function add()
    {
        $members = DB::table('member_ship')->orderBy('nama', 'ASC')->get();
        $jenis_kendaraan = DB::table('jenis_kendaraan')->orderBy('jenis_kendaraan', 'ASC')->get();

        return view('admin.kendaraan_member.tambah', [
            'members' => $members,
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'id_member_ship' => 'required|exists:member_ship,id',
            'id_jenis_kendaraan' => 'required|exists:jenis_kendaraan,id',
            'nopol' => 'required|string|max:20',
        ]);

        DB::table('kendaraan_member')->insert([
            'id_member_ship' => $request->id_member_ship,
            'id_jenis_kendaraan' => $request->id_jenis_kendaraan,
            'nopol' => $request->nopol,
        ]);

        return redirect('/admin/kendaraan_member')->with("success","Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $kendaraan_member = DB::table('kendaraan_member')->where('id', $id)->first();
        $members = DB::table('member_ship')->orderBy('nama', 'ASC')->get();
        $jenis_kendaraan = DB::table('jenis_kendaraan')->orderBy('jenis_kendaraan', 'ASC')->get();

        return view('admin.kendaraan_member.edit', [
            'kendaraan_member' => $kendaraan_member,
            'members' => $members,
            'jenis_kendaraan' => $jenis_kendaraan
        ]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_member_ship' => 'required|exists:member_ship,id',
            'id_jenis_kendaraan' => 'required|exists:jenis_kendaraan,id',
            'nopol' => 'required|string|max:20',
        ]);

        DB::table('kendaraan_member')->where('id', $id)->update([
            'id_member_ship' => $request->id_member_ship,
            'id_jenis_kendaraan' => $request->id_jenis_kendaraan,
            'nopol' => $request->nopol,
        ]);

        return redirect('/admin/kendaraan_member')->with("success","Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        DB::table('kendaraan_member')->where('id', $id)->delete();
        return redirect('/admin/kendaraan_member')->with("success","Data Berhasil Dihapus !");
    }
}
