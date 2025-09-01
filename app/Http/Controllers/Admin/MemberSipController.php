<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MemberSipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Tampil semua member_sip
    public function read()
    {
        $member_sip = DB::table('member_sip')->orderBy('id','DESC')->get();
        return view('admin.member_sip.index', ['member_sip' => $member_sip]);
    }

    // Form tambah
    public function add()
    {
        return view('admin.member_sip.tambah');
    }

    // Simpan data baru
    public function create(Request $request)
    {
        $request->validate([
            'id_metode_pembayaran' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nohp' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('foto')->store('foto_member_sip', 'public');

        DB::table('member_sip')->insert([
            'id_metode_pembayaran' => $request->id_metode_pembayaran,
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'foto' => $path
        ]);

        return redirect('/admin/member_sip')->with("success","Data Berhasil Ditambah !");
    }

    // Form edit
    public function edit($id)
    {
        $member_sip = DB::table('member_sip')->where('id', $id)->first();
        return view('admin.member_sip.edit', ['member_sip' => $member_sip]);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_metode_pembeyaran' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nohp' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = ['nama' => $request->nama];

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_member_sip', 'public');
            $data['foto'] = $path;
        }

        DB::table('member_sip')->where('id', $id)->update($data);

        return redirect('/admin/member_sip')->with("success","Data Berhasil Diupdate !");
    }

    // Hapus data
    public function delete($id)
    {
        $member_sip = DB::table('member_sip')->where('id', $id)->first();
        if ($member_sip && $member_sip->foto) {
            Storage::disk('public')->delete($member_sip->foto);
        }

        DB::table('member_sip')->where('id', $id)->delete();
        return redirect('/admin/member_sip')->with("success","Data Berhasil Dihapus !");
    }
}
