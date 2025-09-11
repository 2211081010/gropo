@extends('admin.layouts.app', [
    'activePage' => 'metode_pembayaran',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="title">
               <h4>Edit Metode Pembayaran</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/metode_pembayaran">Data Metode Pembayaran</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Metode Pembayaran</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/metode_pembayaran" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr style="margin-top: 0px">

      <form action="/admin/metode_pembayaran/update/{{$metode_pembayaran->id}}" method="POST">
         @csrf

         <div class="form-group">
            <label>Metode Pembayaran<span class="text-danger">*</span></label>
            <input type="text" name="nama_metode" required class="form-control"
                   value="{{ $metode_pembayaran->nama_metode }}"
                   placeholder="Masukkan Nama Kategori .....">
         </div>

         <button type="submit" class="btn btn-primary mt-1 mr-2">
            <span class="icon-copy ti-save"></span> Update Data
         </button>
      </form>
   </div>
</div>
@endsection
