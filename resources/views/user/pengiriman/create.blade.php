@extends('layouts.app')
@section('title', 'Create Pengiriman')
@section('navbar', 'Tambah Pengiriman')

@section('content')
<div>
    <div class="container mx-auto">
        <div class="d-flex flex-row justify-content-center">
            <div class="card bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 35rem;">
                <div class="card-body text-gray-900">
                    <!-- Form Pengiriman -->
                     <h1 class="fs-3 fw-bold mb-3 text-center">Tambah Pengiriman</h1>
                    <form action="{{ route('user.pengiriman.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="nomor_order" class="block text-gray-700 form-label">Order</label>
                            <select id="nomor_order" name="nomor_order" class="w-full p-2 border rounded form-control" required>
                                <option value="" disabled selected>Pilih Order</option>
                                @foreach($orderMaterials as $order)
                                    <option value="{{ $order->nomor_order }}">
                                        {{ $order->nomor_order }} - {{ $order->nama_material }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_kirim" class="block text-gray-700 form-label">Tanggal Kirim</label>
                            <input type="datetime-local" id="tanggal_kirim" name="tanggal_kirim" class="w-full p-2 border rounded form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_selesai" class="block text-gray-700 form-label">Tanggal Selesai</label>
                            <input type="datetime-local" id="tanggal_selesai" name="tanggal_selesai" class="w-full p-2 border rounded form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="status_pengiriman" class="block text-gray-700 form-label">Status Pengiriman</label>
                            <select id="status_pengiriman" name="status_pengiriman" class="w-full p-2 border rounded form-control" required>
                                <option selected>Pilih Status</option>
                                <option value="proses">Proses</option>
                                <option value="dikirim">Di Kirim</option>
                                <option value="batal">Batal</option>
                            </select>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary w-100">Tambah Pengiriman</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="{{ route('user.pengiriman') }}" class="btn btn-outline-secondary mb-3 w-25">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
