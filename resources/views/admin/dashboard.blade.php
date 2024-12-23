@extends('admin.app')

@section('title', 'Material')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Dashboard')
@section('navbar-item', 'Admin')

@section('content')


      <div class="row g-2 mt-3">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="height: 15rem">
              <div class="card shadow p-3 h-100">
                <h5 class="card-title">Proyek Aktif</h5><hr class="text-dark">
                <div class="card-body mt-3">
                  <h1 class="text-center fs-1 fw-bold">{{$totalProyek}}</h1>
                  <p class="text-center fs-5 fw-semibold">Proyek</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="height: 15rem">
              <div class="card shadow p-3 h-100">
                <h5 class="card-title">Jumlah Pemasok</h5><hr class="text-dark">
                <div class="card-body mt-3">
                  <p class="card-text text-center fs-1 fw-bold">{{ $totalPemasok }}</p>
                  <P class="text-center fs-5 fw-semibold">Pemasok</P>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="height: 15rem">
              <div class="card shadow p-3 h-100">
                <h5 class="card-title">Jumlah Material Pemasok</h5><hr class="text-dark">
                <div class="card-body mt-3">
                  <p class="card-text text-center fs-1 fw-bold">{{ $totalMaterialPemasok }}</p>
                  <P class="text-center fs-5 fw-semibold">Material Pemasok</P>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="height: 15rem">
                <div class="card shadow p-3 h-100">
                  <h5 class="card-title">Jumlah Material Proyek</h5><hr class="text-dark">
                  <div class="card-body mt-3">
                    <p class="card-text text-center fs-1 fw-bold">{{ $totalMaterialProyek}}</p>
                    <P class="text-center fs-5 fw-semibold">Material Proyek</P>
                  </div>
                </div>
              </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="height: 15rem">
                <div class="card shadow p-3 h-100">
                    <h5 class="card-title">Jumlah Pengiriman</h5>
                    <hr class="text-dark">
                    <div class="card-body mt-3">
                        <p class="card-text text-center fs-1 fw-bold">{{ $totalPengiriman }}</p>
                        <p class="text-center fs-5 fw-semibold">Pengiriman</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-4 col-lg-4" style="height: 15rem">
              <div class="card shadow p-3 h-100">
                <h5 class="card-title">Jumlah Kontrak</h5><hr class="text-dark">
                <div class="card-body mt-3">
                  <p class="card-text text-center fs-1 fw-bold">{{ $totalKontrak }}</p>
                  <P class="text-center fs-5 fw-semibold">Kontrak</P>
                </div>
              </div>
            </div>
      </div>
    </div>
@endsection

