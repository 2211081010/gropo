@extends('admin.layouts.app', [
    'activePage' => 'kendaraan_member',
])
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Data Kendaraan Member</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kendaraan Member</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Kendaraan Member</h2>
            </div>
            <div class="pull-right">
                <a href="/admin/kendaraan_member/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <hr style="margin-top: 0px;">

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <table class="table table-striped table-bordered data-table hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th width="5%">#</th>
                    <th>Nama Member</th>
                    <th>Jenis Kendaraan</th>
                    <th>Nopol</th>
                    <th class="table-plus datatable-nosort text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kendaraan_member as $no => $data)
                <tr>
                    <td class="text-center">{{ $no + 1 }}</td>
                    <td>{{ $data->nama_member }}</td>
                    <td>{{ $data->nama_jenis_kendaraan }}</td>
                    <td>{{ $data->nopol }}</td>
                    <td class="text-center" width="15%">
                        <a href="/admin/kendaraan_member/edit/{{$data->id}}" class="btn btn-success btn-xs" data-toggle="tooltip" title="Edit Data">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-{{$data->id}}" title="Delete Data">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Hapus -->
@foreach($kendaraan_member as $data)
<div class="modal fade" id="delete-{{$data->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4>Apakah Anda Yakin Menghapus Data Ini?</h4>
                <p><strong>Member:</strong> {{ $data->nama_member }}</p>
                <p><strong>Jenis Kendaraan:</strong> {{ $data->nama_jenis_kendaraan }}</p>
                <p><strong>Nopol:</strong> {{ $data->nopol }}</p>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <a href="/admin/kendaraan_member/delete/{{$data->id}}">
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
