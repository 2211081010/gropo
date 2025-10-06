<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MemberShipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampil semua member_ship
    public function read()
    {
        $member_ship = DB::table('member_ship')
            ->join('metode_pembayarans', 'member_ship.id_metode_pembayaran', '=', 'metode_pembayarans.id')
            ->select('member_ship.*', 'metode_pembayarans.nama_metode')
            ->orderBy('member_ship.id', 'DESC')
            ->get();

        return view('admin.member_ship.index', compact('member_ship'));
    }

    // Menampilkan detail member_ship
    public function show($id)
    {
        $member_ship = DB::table('member_ship')
            ->join('metode_pembayarans', 'member_ship.id_metode_pembayaran', '=', 'metode_pembayarans.id')
            ->where('member_ship.id', $id)
            ->select('member_ship.*', 'metode_pembayarans.nama_metode')
            ->first();

        return view('admin.member_ship.detail', compact('member_ship'));
    }

    // Form tambah
    public function add()
    {
        $metode_pembayarans = DB::table('metode_pembayarans')->get();
        return view('admin.member_ship.tambah', compact('metode_pembayarans'));
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'id_metode_pembayaran' => 'required|exists:metode_pembayarans,id',
            'nama' => 'required|string|max:255',
            'nohp' => 'required|string|max:20',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('foto')->store('foto_member_ship', 'public');

        DB::table('member_ship')->insert([
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'foto' => $path
        ]);

        return redirect('/admin/member_ship')->with("success","Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $member_ship = DB::table('member_ship')->where('id', $id)->first();
        $metode_pembayaran = DB::table('metode_pembayarans')->get();

        return view('admin.member_ship.edit', compact('member_ship', 'metode_pembayaran'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_metode_pembayaran' => 'required|exists:metode_pembayarans,id',
            'nama' => 'required|string|max:255',
            'nohp' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'nama' => $request->nama,
            'nohp' => $request->nohp,
        ];

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_member_ship', 'public');
            $data['foto'] = $path;
        }

        DB::table('member_ship')->where('id', $id)->update($data);

        return redirect('/admin/member_ship')->with("success","Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        $member_ship = DB::table('member_ship')->where('id', $id)->first();
        if ($member_ship && $member_ship->foto) {
            Storage::disk('public')->delete($member_ship->foto);
        }

        DB::table('member_ship')->where('id', $id)->delete();
        return redirect('/admin/member_ship')->with("success","Data Berhasil Dihapus !");
    }
}
