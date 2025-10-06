@extends('admin.layouts.app', [
    'activePage' => 'member_ship',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Member</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Account</a></li>
                  <li class="breadcrumb-item"><a href="/admin/lokasi">Data Member</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data Member</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <!-- Striped table start -->
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Member</h2>
         </div>@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Member</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Account</a></li>
                  <li class="breadcrumb-item"><a href="/admin/lokasi">Data Member</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data Member</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <!-- Striped table start -->
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Member</h2>
         </div>@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Member</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Account</a></li>
                  <li class="breadcrumb-item"><a href="/admin/lokasi">Data Member</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data Member</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <!-- Striped table start -->
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Member</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/member" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr style="margin-top: 0px">

    <div class="pd-20 card-box mb-30">
        <!-- Tampilkan error jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/member_ship/update/{{$member_ship->id}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <!-- Kiri: Nama Member + No HP -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Member <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" required
                               value="{{ $member_ship->nama }}" placeholder="Masukkan Nama Member ...">
                    </div>

                    <div class="form-group">
                        <label>No Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="nohp" class="form-control" required
                               value="{{ $member_ship->nohp }}" placeholder="Masukkan No HP ...">
                    </div>
                    <div class="form-group">
                        <label>Metode Pembayaran <span class="text-danger">*</span></label>
                        <select name="id_metode_pembayaran" class="form-control" required>
                            <option value="">-- Pilih Metode Pembayaran --</option>
                            @foreach($metode_pembayaran as $mp)
                                <option value="{{ $mp->id }}"
                                    {{ $member_ship->id_metode_pembayaran == $mp->id ? 'selected' : '' }}>
                                    {{ $mp->nama_metode }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Kanan: Metode Pembayaran + Foto -->
                <div class="col-md-6">
                    <div class="form-group mt-3">
                        <label>Foto Member</label>
                        <input type="file" name="foto" id="fotoInput" class="form-control">
                        <small class="text-muted">Pilih foto baru jika ingin mengganti</small>
                         <div class="mb-2">
                            <img id="fotoPreview"
                                 src="{{ $member_ship->foto ? asset('storage/'.$member_ship->foto) : 'https://via.placeholder.com/200x200?text=No+Image' }}"
                                 alt="Foto Member"
                                 class="img-fluid rounded"
                                 style="width: 100%; max-width: 250px; height: auto; border: 1px solid #ddd;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="ti-save"></i> Update
                </button>
                <a href="/admin/member_ship" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

<!-- Script Preview Foto -->
<script>
    document.getElementById("fotoInput").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById("fotoPreview");

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
