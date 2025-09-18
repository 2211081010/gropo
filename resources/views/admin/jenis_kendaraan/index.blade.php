@extends('admin.layouts.app', [
'activePage' => 'jenis_kendaraan',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Jenis Kendaraan</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Jenis Kendaraan</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <!-- Striped table start -->
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Jenis Kendaraan</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/jenis_kendaraan/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
         </div>
      </div>
      <hr style="margin-top: 0px;">
      @if (session('error'))
      <div class="alert alert-danger">
         {{ session('error')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif
      @if (session('success'))
      <div class="alert alert-success">
         {{ session('success')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif
      <table class="table table-striped table-bordered data-table hover">
         <thead class="bg-primary text-white">
            <tr>
               <th width="5%">#</th>
               <th>Jenis Kendaraan</th>
               <th>Tarif</th>
               <th class="table-plus datatable-nosort text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1; ?>
            @foreach($jenis_kendaraan as $data)
            <tr>
               <td class="text-center">{{$no++}}</td>
               <td>{{$data->jenis_kendaraan}}</td>
               <td>{{$data->tarif}}</td>
               <td class="text-center" width="15%">
                  <a href="/admin/jenis_kendaraan/edit/{{$data->id}}" class="btn btn-success btn-xs">
                     <i class="fa fa-edit" data-toggle="tooltip" title="Edit Data"></i>
                  </a>
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#data-{{$data->id}}">
                     <i class="fa fa-trash" data-toggle="tooltip" title="Delete Data"></i>
                  </button>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   <!-- Striped table End -->
</div>
<!-- Modal -->
@foreach($jenis_kendaraan as $data)
<div class="modal fade" id="data-{{$data->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h2 class="text-center">Apakah Anda Yakin Menghapus Data Ini ?</h2>
            <hr>
            <div class="form-group" style="font-size: 17px;">
               <label>Jenis Kendaraan</label>
               <input class="form-control" value="{{$data->jenis_kendaraan}}" readonly>
            </div>
            <div class="form-group" style="font-size: 17px;">
               <label>Tarif</label>
               <input class="form-control" value="{{$data->tarif}}" readonly>
            </div>
            <div class="row mt-4">
               <div class="col-md-6">
                  <a href="/admin/jenis_kendaraan/delete/{{$data->id}}">
                     <button type="button" class="btn btn-primary btn-block">Ya</button>
                  </a>
               </div>
               <div class="col-md-6">
                  <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Tidak</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endforeach
@endsection
