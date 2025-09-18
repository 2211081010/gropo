@extends('admin.layouts.app', [
    'activePage' => 'member_sip',
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
         </div>

    <div class="row">
        <!-- Kolom Kiri: Foto + Info Member -->
        <div class="col-md-6 mb-3">
            <div class="card">
                <!-- Tombol Kembali di dalam card, kiri atas -->
                <div class="card-header p-2 bg-light text-start">
                    <a href="/admin/member_sip" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>

                <!-- Foto di tengah card -->
                <div class="card-body text-center">
                    @if($member_sip->foto && file_exists(public_path('storage/' . $member_sip->foto)))
                        <img src="{{ asset('storage/' . $member_sip->foto) }}" alt="Foto Member"
                             class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" alt="Tidak ada foto"
                             class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    @endif

                    <!-- Informasi Member -->
                    <table class="table table-borderless mb-0 text-left mx-auto" style="max-width: 400px;">
                        <tr>
                            <th style="width: 40%;">Nama</th>
                            <td>{{ $member_sip->nama }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>{{ $member_sip->nohp }}</td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td>{{ $member_sip->nama_metode }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
