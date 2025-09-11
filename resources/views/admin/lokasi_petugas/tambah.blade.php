@extends('admin.layouts.app', [
'activePage' => 'lokasi_petugas',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="title">
               <h4>Data Lokasi Petugas</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/lokasi_petugas">Data Lokasi Petugas</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-add-file-1"></i> Tambah Data Lokasi Petugas</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/lokasi_petugas" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr style="margin-top: 0px">

      <form action="/admin/lokasi_petugas/create" method="POST">
         @csrf

         <div class="form-group">
            <label>Nama Lokasi <span class="text-danger">*</span></label>
            <select name="id_lokasi" class="form-control" required>
                <option value="">-- Pilih Lokasi --</option>
                @foreach($lokasi as $lks)
                    <option value="{{ $lks->id }}">{{ $lks->nama }}</option>
                @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>Nama Petugas <span class="text-danger">*</span></label>
            <select name="id_petugas" class="form-control" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach($petugas as $ptg)
                    <option value="{{ $ptg->id }}">{{ $ptg->nama }}</option>
                @endforeach
            </select>
         </div>

         <button type="submit" class="btn btn-primary mt-1 mr-2">
             <span class="icon-copy ti-save"></span> Tambah Data
         </button>
      </form>
   </div>
</div>
@endsection
