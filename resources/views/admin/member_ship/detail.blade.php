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
                  <li class="breadcrumb-item"><a href="/admin/member_ship">Data Member</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail Data Member</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-3">
         <div class="pull-left">
            <h2 class="text-primary h2">
               <i class="icon-copy dw dw-edit-1"></i> Detail Data Member
            </h2>
         </div>
         <div class="pull-right">
            <a href="/admin/member_ship" class="btn btn-primary btn-sm">
               <i class="fa fa-arrow-left"></i> Back
            </a>
         </div>
      </div>
      <hr style="margin-top: 0px">

      <!-- Card Detail Member -->
      <div class="card">
         <div class="card-body text-center">
            @if($member_ship->foto && file_exists(public_path('storage/' . $member_ship->foto)))
               <img src="{{ asset('storage/' . $member_ship->foto) }}" alt="Foto Member"
                    class="rounded-circle mb-3"
                    style="width: 150px; height: 150px; object-fit: cover;">
            @else
               <img src="{{ asset('images/no-image.png') }}" alt="Tidak ada foto"
                    class="rounded-circle mb-3"
                    style="width: 150px; height: 150px; object-fit: cover;">
            @endif

            <!-- Info Member -->
            <table class="table table-borderless mb-0 text-left mx-auto" style="max-width: 400px;">
               <tr>
                  <th style="width: 40%;">Nama</th>
                  <td>{{ $member_ship->nama }}</td>
               </tr>
               <tr>
                  <th>No. HP</th>
                  <td>{{ $member_ship->nohp }}</td>
               </tr>
               <tr>
                  <th>Metode Pembayaran</th>
                  <td>{{ $member_ship->nama_metode }}</td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
