@extends('layouts.app')
@section('title', 'Edit Pengiriman')
@section('navbar', 'Edit Pengiriman')

@section('content')
<div>
    <div class="container mx-auto">
        <div class="d-flex flex-row justify-content-center">
            <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 35rem;">
                <div class="card-body p-6 text-gray-900">
                    <h1 class="fs-3 fw-bold mb-3 text-center">Edit Pengiriman</h1>
                    <form action="{{ route('user.pengiriman.update', $pengiriman->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nomor_order" class="form-label">Order</label>
                            <select class="form-control" id="nomor_order" name="nomor_order" required>
                                <option value="" disabled>Pilih Order</option>
                                @foreach($orderMaterials as $order)
                                    <option value="{{ $order->nomor_order }}" {{ old('nomor_order', $pengiriman->orderMaterial->nomor_order) == $order->nomor_order ? 'selected' : '' }}>
                                        {{ $order->nomor_order }} - {{ $order->keterangan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                            <input type="datetime-local" class="form-control" id="tanggal_kirim" name="tanggal_kirim" value="{{ old('tanggal_kirim', $pengiriman->tanggal_kirim) }}">
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $pengiriman->tanggal_selesai) }}">
                        </div>

                        <div class="mb-3">
                            <label for="status_pengiriman" class="form-label">Status Pengiriman</label>
                            <select class="form-select" id="status_pengiriman" name="status_pengiriman">
                                <option value="dikirim" {{ $pengiriman->status_pengiriman == 'dikirim' ? 'selected' : '' }}>Di Kirim</option>
                                <option value="proses" {{ $pengiriman->status_pengiriman == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="batal" {{ $pengiriman->status_pengiriman == 'batal' ? 'selected' : '' }}>Batal</option>
                                <option value="selesai" {{ $pengiriman->status_pengiriman == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-warning w-100">Update Pengiriman</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="{{ route('user.pengiriman') }}" class="btn btn-outline-secondary mb-3 w-25">Kembali </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
