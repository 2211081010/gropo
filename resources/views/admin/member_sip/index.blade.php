@extends('admin.layouts.app', [
'activePage' => 'member_sip',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Member Sip</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Account</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Member Sip</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Member Sip</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/member_sip/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
         </div>
      </div>
      <hr>
      @if (session('success'))
      <div class="alert alert-success">{{ session('success')}}</div>
      @endif
      <table class="table table-striped table-bordered data-table hover">
         <thead class="bg-primary text-white">
            <tr>
               <th width="5%">#</th>
               <th>Foto</th>
               <th>Metode Pembayaran</th>
               <th>Nama Member</th>
               <th>No HP</th>
               <th class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($member_sip as $no => $data)
            <tr>
               <td class="text-center">{{ $no+1 }}</td>
               <td class="text-center">
                  @if($data->foto)
                     <img src="{{ asset('storage/'.$data->foto) }}" width="80" class="img-thumbnail">
                  @else
                     <span class="text-muted">Tidak ada foto</span>
                  @endif
               </td>
               <td>{{ $data->nama_metode }}</td>
               <td>{{ $data->nama }}</td>
               <td>{{ $data->nohp }}</td>
               <td class="text-center">
                <a href="/admin/member_sip/show/{{$data->id}}" class="btn btn-info btn-xs" title="Detail"><i class="fa fa-eye"></i></a>
                <a href="/admin/member_sip/edit/{{$data->id}}" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="/admin/member_sip/delete/{{$data->id}}" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection
