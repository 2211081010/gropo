@extends('admin.layouts.app', [
    'activePage' => 'lokasi',
])
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Data Lokasi</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item"><a href="/admin/lokasi">Data Lokasi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data Lokasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-3">
            <div class="pull-left">
                <h2 class="text-primary h2"><i class="icon-copy dw dw-add-file-1"></i> Tambah Data Lokasi</h2>
            </div>
            <div class="pull-right">
                <a href="/admin/lokasi" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <hr style="margin-top: 0px">

        <form action="/admin/lokasi/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Kolom Kiri: Input Text -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Lokasi <span class="text-danger">*</span></label>
                        <input type="text" name="nama" required class="form-control" placeholder="Masukkan Nama Lokasi .....">
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <input type="text" name="alamat" required class="form-control" placeholder="Masukkan Alamat .....">
                    </div>
                    <div class="form-group">
                        <label>Titik Koordinat <span class="text-danger">*</span></label>
                        <input type="text" name="koordinat" required class="form-control" placeholder="Masukkan Titik Koordinat .....">
                    </div>
                </div>

                <!-- Kolom Kanan: Foto Upload + Preview -->
    <div class="col-md-6 d-flex flex-column align-items-start">
        <div class="form-group w-100 mb-2"> {{-- mb-0 agar rapat --}}
            <label>Foto <span class="text-danger">*</span></label>
            <input type="file" name="foto" id="fotoInput" class="form-control" required>
        </div>
        <div class="w-100 text-start"> {{-- hapus margin agar menempel --}}
            <img id="fotoPreview" src="#" alt="Preview Foto"
                style="width: 100%; max-width: 100%; max-height:185px; display: none;
                              border: 1px solid #ddd; border-radius: 8px; margin-top: 10px; padding: 4px;">
        </div>
    </div>
</div>
            <button type="submit" class="btn btn-primary mt-3">
                <i class="ti-save"></i> Tambah Data
            </button>
        </form>
    </div>
</div>

<!-- Script Preview Gambar -->
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
