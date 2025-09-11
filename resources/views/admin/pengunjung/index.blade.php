@extends('admin.layouts.app', ['activePage' => 'pengunjung'])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <h4>Data Pengunjung</h4>
      <a href="/admin/pengunjung/add" class="btn btn-primary btn-sm float-right">Tambah Data</a>
   </div>

   @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
   @endif

   <table class="table table-striped table-bordered">
      <thead class="bg-primary text-white">
         <tr>
            <th>#</th>
            <th>Nama Member</th>
            <th>Metode Pembayaran</th>
            <th>Lokasi</th>
            <th>Petugas</th>
            <th>Jenis Kendaraan</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>NoPol</th>
            <th>Bukti Pembayaran</th>
            <th>Status</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach($pengunjung as $no => $data)
         <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->nama_member }}</td>
            <td>{{ $data->nama_metode }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->nama_petugas }}</td>
            <td>{{ $data->jenis_kendaraan }}</td>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->jam_masuk }}</td>
            <td>{{ $data->jam_keluar }}</td>
            <td>{{ $data->nopol }}</td>
            <td>
                @if($data->bukti_pembayaran)
                    <a href="{{ asset('storage/'.$data->bukti_pembayaran) }}" target="_blank">Lihat</a>
                @endif
            </td>
            <td>{{ $data->status }}</td>
            <td>
                <a href="/admin/pengunjung/edit/{{$data->id}}" class="btn btn-success btn-xs">Edit</a>
                <a href="/admin/pengunjung/delete/{{$data->id}}" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-xs">Hapus</a>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection
