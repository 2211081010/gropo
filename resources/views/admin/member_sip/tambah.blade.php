@extends('admin.layouts.app', [
    'activePage' => 'member_sip',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="title">
               <h4>Data Member</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Account</a></li>
                  <li class="breadcrumb-item"><a href="/admin/lokasi_petugas">Data Member</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
<div class="pd-20 card-box mb-30">
        <div class="clearfix mb-3">
            <div class="pull-left">
                <h2 class="text-primary h2"><i class="icon-copy dw dw-add-file-1"></i> Tambah Data Member</h2>
            </div>
            <div class="pull-right">
                <a href="/admin/lokasi" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <hr style="margin-top: 0px">
    <!-- Form Card -->
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

        <form action="/admin/member_sip/create" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <!-- Kolom Kiri: Nama & No HP & Metode Pembayaran -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Member <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" required placeholder="Masukkan Nama Member ...">
                    </div>

                    <div class="form-group">
                        <label>No Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="nohp" class="form-control" required placeholder="Masukkan No HP ...">
                    </div>

                    <div class="form-group">
                        <label>Metode Pembayaran <span class="text-danger">*</span></label>
                        <select name="id_metode_pembayaran" class="form-control" required>
                            <option value="">-- Pilih Metode Pembayaran --</option>
                            @foreach($metode_pembayarans as $mp)
                                <option value="{{ $mp->id }}">{{ $mp->nama_metode }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Kolom Kanan: Foto -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Foto <span class="text-danger">*</span></label>
                        <input type="file" name="foto" id="fotoInput" class="form-control" required>
                        <!-- Preview Foto -->
                        <img id="fotoPreview" src="#" alt="Preview Foto"
                             style="width: 100%; max-width: 200px; height: auto; display: none;
                                    border: 1px solid #ddd; border-radius: 8px; margin-top: 10px; padding: 4px;">
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="ti-save"></i> Simpan
                </button>
                <a href="/admin/member_sip" class="btn btn-secondary">Kembali</a>
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
                preview.style.display = "block";
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = "none";
        }
    });
</script>
@endsection
