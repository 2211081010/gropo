@extends('admin.layouts.app', [
'activePage' => 'petugas',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data petugas</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/petugas">Data petugas</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data petugas</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <!-- Striped table start -->
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data petugas</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/petugas" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr style="margin-top: 0px">
      <form action="/admin/petugas/update/{{$petugas->id}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label>Nama petugas<span class="text-danger">*</span></label>
            <input type="text" autofocus name="nama" required class="form-control" value="{{$petugas->nama}}" placeholder="Masukkan Nama petugas .....">
         </div>
         <button type="submit" class="btn btn-primary mt-1 mr-2"><span class="icon-copy ti-save"></span> Update Data</button>
      </form>
   </div>
   <!-- Striped table End -->
</div>
@endsection
