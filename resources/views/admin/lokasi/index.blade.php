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
                        <li class="breadcrumb-item active" aria-current="page">Data Lokasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Table start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-2">
            <div class="pull-left">
                <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Lokasi</h2>
            </div>
            <div class="pull-right">
                <a href="/admin/lokasi/add" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>

        <hr style="margin-top: 0px;">

        {{-- Alert --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        {{-- Data table --}}
        <table class="table table-striped table-bordered data-table hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th width="5%">#</th>
                    <th>Foto</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat</th>
                    <th class="table-plus datatable-nosort text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lokasi as $index => $data)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center" width="15%">
                            @if($data->foto && file_exists(public_path('storage/' . $data->foto)))
                                <img src="{{ asset('storage/' . $data->foto) }}" width="80" class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td class="text-center" width="20%">
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $data->koordinat }}" target="_blank" class="btn btn-info btn-xs mb-1">
                                <i class="fa fa-map-marker"></i>
                            </a>
                            <a href="/admin/lokasi/edit/{{ $data->id }}" class="btn btn-success btn-xs mb-1">
                                <i class="fa fa-edit" data-toggle="tooltip" title="Edit Data"></i>
                            </a>
                            <button class="btn btn-danger btn-xs mb-1" data-toggle="modal" data-target="#deleteModal-{{ $data->id }}">
                                <i class="fa fa-trash" data-toggle="tooltip" title="Hapus Data"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Table end -->
</div>

{{-- Modal Hapus --}}
@foreach($lokasi as $data)
<div class="modal fade" id="deleteModal-{{ $data->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4>Apakah Anda yakin ingin menghapus data ini?</h4>
                <hr>
                @if($data->foto && file_exists(public_path('storage/' . $data->foto)))
                    <img src="{{ asset('storage/' . $data->foto) }}" width="100" class="img-thumbnail mb-2">
                @endif
                <p><strong>{{ $data->nama }}</strong></p>
                <p>{{ $data->alamat }}</p>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <a href="/admin/lokasi/delete/{{ $data->id }}">
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
