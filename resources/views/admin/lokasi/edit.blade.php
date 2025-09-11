@extends('admin.layouts.app', [
'activePage' => 'lokasi',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Lokasi</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/lokasi">Data Lokasi</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data Lokasi</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <!-- Striped table start -->
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Lokasi</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/lokasi" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr style="margin-top: 0px">

      <form action="/admin/lokasi/update/{{$lokasi->id}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label>Nama Lokasi <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" value="{{$lokasi->nama}}" required placeholder="Masukkan Nama Lokasi...">
         </div>

         <div class="form-group">
            <label>Alamat <span class="text-danger">*</span></label>
            <textarea name="alamat" class="form-control" required placeholder="Masukkan Alamat...">{{$lokasi->alamat}}</textarea>
         </div>

         <div class="form-group">
            <label>Koordinat <span class="text-danger">*</span></label>
            <input type="text" name="koordinat" class="form-control" value="{{$lokasi->koordinat}}" required placeholder="Contoh: -6.200000, 106.816666">
         </div>

         <div class="form-group">
            <label>Foto Lokasi</label>
            <input type="file" name="foto" class="form-control">
            @if($lokasi->foto)
               <p class="mt-2">Foto saat ini:</p>
               <img src="{{ asset('storage/lokasi/'.$lokasi->foto) }}" alt="Foto Lokasi" width="200px" class="img-thumbnail">
            @endif
         </div>

         <button type="submit" class="btn btn-primary mt-1 mr-2">
            <span class="icon-copy ti-save"></span> Update Data
         </button>
      </form>
   </div>
   <!-- Striped table End -->
</div>
@endsection
