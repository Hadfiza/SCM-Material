
@extends('layouts.app')

@section('title', 'Material')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Dashboard')
@section('navbar-item', 'Supplier')

@section('content')

<div class="row g-2 mt-3">
    <div class="col-md-4">
        <div class="card shadow p-3">
            <h5 class="card-title">Jumlah Pengiriman</h5>
            <hr class="text-dark">
            <div class="card-body mt-3">
                <p class="card-text text-center fs-1 fw-bold">{{ $totalPengiriman }}</p>
                <p class="text-center fw-semibold">Pengiriman</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow p-3">
            <h5 class="card-title">Jumlah Material</h5>
            <hr class="text-dark">
            <div class="card-body mt-3">
                <p class="card-text text-center fs-1 fw-bold">{{ $totalMaterialPemasok }}</p>
                <p class="text-center fw-semibold">Material</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow p-3">
            <h5 class="card-title">Jumlah Kontrak</h5>
            <hr class="text-dark">
            <div class="card-body mt-3">
                <p class="card-text fs-1 text-center fw-bold">{{ $totalKontrak }}</p>
                <p class="text-center fw-semibold">Kontrak</p>
            </div>
        </div>
    </div>
</div>

@endsection

