@extends('admin.layouts.app', [
'activePage' => 'kendaraan_member',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="title">
               <h4>Data Kendaraan Member</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/kendaraan_member">Data Kendaraan Member</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-add-file-1"></i> Tambah Data Kendaraan Member</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/kendaraan_member" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr style="margin-top: 0px">

      <form action="/admin/kendaraan_member/create" method="POST">
         @csrf

         <div class="form-group">
            <label>Nama Member<span class="text-danger">*</span></label>
            <select name="id_member_ship" class="form-control" required>
                <option value="">-- Pilih Member --</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->nama }}</option>
                @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>Jenis Kendaraan<span class="text-danger">*</span></label>
            <select name="id_jenis_kendaraan" class="form-control" required>
                <option value="">-- Pilih Jenis Kendaraan --</option>
                @foreach($jenis_kendaraan as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_kendaraan }}</option>
                @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>NoPol<span class="text-danger">*</span></label>
            <input type="text" name="nopol" class="form-control" required placeholder="Masukkan Nomor Polisi .....">
         </div>

         <button type="submit" class="btn btn-primary mt-1 mr-2">
             <span class="icon-copy ti-save"></span> Tambah Data
         </button>
      </form>
   </div>
</div>
@endsection
