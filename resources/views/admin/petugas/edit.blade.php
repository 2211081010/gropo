@extends('admin.layouts.app', [
    'activePage' => 'petugas',
])
@section('content')
<div class="min-height-200px">
    <!-- Header Page -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Edit Data Petugas</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item"><a href="/admin/petugas">Data Petugas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Petugas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-3">
            <div class="pull-left">
                <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Petugas</h2>
            </div>
            <div class="pull-right">
                <a href="/admin/petugas" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <hr style="margin-top: 0px">

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

        <form action="/admin/petugas/update/{{$petugas->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Kiri: Kantor, Nama, No HP -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kantor<span class="text-danger">*</span></label>
                        <select name="id_kantor" class="form-control" required>
                            <option value="">-- Pilih Kantor --</option>
                            @foreach($kantor as $k)
                                <option value="{{ $k->id }}" {{ $petugas->id_kantor == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kantor }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Petugas<span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" required
                               value="{{ $petugas->nama }}" placeholder="Masukkan Nama Petugas ...">
                    </div>

                    <div class="form-group">
                        <label>No HP<span class="text-danger">*</span></label>
                        <input type="text" name="nohp" class="form-control" required
                               value="{{ $petugas->nohp }}" placeholder="Masukkan Nomor HP ...">
                    </div>
                </div>

                <!-- Kanan: Foto lama + Preview foto baru -->
                <div class="col-md-6">
                    <div class="form-group text-center">
                        <label>Foto Lama</label>
                        <div class="mb-2">
                            <img id="fotoLama"
                                 src="{{ $petugas->foto ? asset('uploads/petugas/'.$petugas->foto) : 'https://via.placeholder.com/200x200?text=No+Image' }}"
                                 alt="Foto Lama Petugas"
                                 class="img-fluid rounded"
                                 style="width: 100%; max-width: 250px; height: auto; border: 1px solid #ddd;">
                        </div>

                        <label>Ganti Foto</label>
                        <input type="file" name="foto" id="fotoInput" class="form-control mb-2">
                        <small class="text-muted">Pilih foto baru jika ingin mengganti</small>

                        <div class="mt-2">
                            <p class="mb-1">Preview Foto Baru:</p>
                            <img id="fotoPreview"
                                 src="#"
                                 alt="Preview Foto"
                                 style="width: 100%; max-width: 250px; height: auto; display: none;
                                        border: 1px solid #ddd; border-radius: 8px;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="ti-save"></i> Update
                </button>
                <a href="/admin/petugas" class="btn btn-secondary">Kembali</a>
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
