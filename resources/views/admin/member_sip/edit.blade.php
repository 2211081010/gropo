@extends('admin.layouts.app', [
    'activePage' => 'member_sip',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="title">
               <h4>Edit Data Member Sip</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/member_sip">Data Member Sip</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <form action="/admin/member_sip/update/{{$member_sip->id}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}

         <div class="form-group">
            <label>Nama Member<span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" required
                   value="{{ $member_sip->nama }}" placeholder="Masukkan Nama member ...">
         </div>

         <div class="form-group">
            <label>No Telepon<span class="text-danger">*</span></label>
            <input type="text" name="nohp" class="form-control" required
                   value="{{ $member_sip->nohp }}" placeholder="Masukkan No HP ...">
         </div>

         <div class="form-group">
            <label>Metode Pembayaran<span class="text-danger">*</span></label>
            <select name="id_metode_pembayaran" class="form-control" required>
               <option value="">-- Pilih Metode Pembayaran --</option>
               @foreach($metode_pembayaran as $mp)
                  <option value="{{ $mp->id }}"
                      {{ $member_sip->id_metode_pembayaran == $mp->id ? 'selected' : '' }}>
                      {{ $mp->nama_metode }}
                  </option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>Foto <span class="text-danger">*</span></label>
            <input type="file" name="foto" class="form-control">
            @if($member_sip->foto)
               <small>Foto saat ini: <a href="{{ asset('storage/'.$member_sip->foto) }}" target="_blank">Lihat</a></small>
            @endif
         </div>

         <button type="submit" class="btn btn-primary mt-1"><i class="ti-save"></i> Update</button>
         <a href="/admin/member_sip" class="btn btn-secondary mt-1">Kembali</a>
      </form>
   </div>
</div>
@endsection
