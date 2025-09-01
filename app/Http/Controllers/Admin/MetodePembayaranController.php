<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class MetodePembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function read(){
        $metode_pembayarans = DB::table('metode_pembayarans')->orderBy('id','DESC')->get();

        return view('admin.metode_pembayaran.index',['metode_pembayarans'=>$metode_pembayarans]);
    }

    public function add(){
        return view('admin.metode_pembayaran.tambah');
    }

    public function create(Request $request){
        DB::table('metode_pembayarans')->insert([
            'nama' => $request->nama]);

        return redirect('/admin/metode_pembayaran')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $metode_pembayarans = DB::table('metode_pembayarans')->where('id',$id)->first();

        return view('admin.metode_pembayaran.edit',['metode_pembayarans'=>$metode_pembayarans]);
    }

    public function update(Request $request, $id) {
        DB::table('metode_pembayarans')
            ->where('id', $id)
            ->update([
            'nama' => $request->nama]);

        return redirect('/admin/metode_pembayaran')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        DB::table('metode_pembayarans')->where('id',$id)->delete();

        return redirect('/admin/metode_pembayaran')->with("success","Data Berhasil Dihapus !");
    }
}
