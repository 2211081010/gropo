@extends('admin.layouts.app', ['activePage' => 'pengunjung'])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <h4>Tambah Data Pengunjung</h4>
   </div>
   <div class="pd-20 card-box mb-30">
      <form action="/admin/pengunjung/create" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="form-group">
            <label>Member<span class="text-danger">*</span></label>
            <select name="id_member_sip" class="form-control" required>
               <option value="">-- Pilih Member --</option>
               @foreach($member_sip as $member)
                  <option value="{{ $member->id }}">{{ $member->nama }}</option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>Metode Pembayaran<span class="text-danger">*</span></label>
            <select name="id_metode_pembayaran" class="form-control" required>
               <option value="">-- Pilih Metode Pembayaran --</option>
               @foreach($metode_pembayaran as $metode)
                  <option value="{{ $metode->id }}">{{ $metode->nama_metode }}</option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>Lokasi<span class="text-danger">*</span></label>
            <select name="id_lokasi" class="form-control" required>
               <option value="">-- Pilih Lokasi --</option>
               @foreach($lokasi as $l)
                  <option value="{{ $l->id }}">{{ $l->nama_lokasi }}</option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>Petugas<span class="text-danger">*</span></label>
            <select name="id_petugas" class="form-control" required>
               <option value="">-- Pilih Petugas --</option>
               @foreach($petugas as $p)
                  <option value="{{ $p->id }}">{{ $p->nama }}</option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>Jenis Kendaraan<span class="text-danger">*</span></label>
            <select name="id_jenis_kendaraan" class="form-control" required>
               <option value="">-- Pilih Jenis Kendaraan --</option>
               @foreach($jenis_kendaraan as $jk)
                  <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
               @endforeach
            </select>
         </div>

         <div class="form-group">
            <label>Tanggal<span class="text-danger">*</span></label>
            <input type="date" name="tanggal" class="form-control" required>
         </div>

         <div class="form-group">
            <label>Jam Masuk<span class="text-danger">*</span></label>
            <input type="time" name="jam_masuk" class="form-control" required>
         </div>

         <div class="form-group">
            <label>Jam Keluar<span class="text-danger">*</span></label>
            <input type="time" name="jam_keluar" class="form-control" required>
         </div>

         <div class="form-group">
            <label>No. Polisi<span class="text-danger">*</span></label>
            <input type="text" name="nopol" class="form-control" placeholder="Masukkan No. Polisi ..." required>
         </div>

         <div class="form-group">
            <label>Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" class="form-control">
         </div>

         <div class="form-group">
            <label>Status<span class="text-danger">*</span></label>
            <select name="status" class="form-control" required>
               <option value="">-- Pilih Status --</option>
               <option value="Masuk">Masuk</option>
               <option value="Keluar">Keluar</option>
            </select>
         </div>

         <button type="submit" class="btn btn-primary mt-1">Simpan</button>
         <a href="/admin/pengunjung" class="btn btn-secondary mt-1">Kembali</a>
      </form>
   </div>
</div>
@endsection
