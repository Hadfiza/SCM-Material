@extends('admin.app')
@section('title', 'Buat Problem')
@section('navbar', 'Buat Problem')

@section('content')
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Problem</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container">
        <div class="card shadow" style="width: 40rem; margin: auto;">
            <div class="card-body">
                <h1 class="fs-3 fw-bold text-center">Buat Problem</h1>
    
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif
    
                <form action="{{ route('admin.problem.store') }}" method="POST" class="space-y-6">
                    @csrf
    
                    <!-- Nomor Order -->
                    <div class="flex flex-col">
                        <label for="nomor_order" class="font-medium text-gray-700 mb-2">Nomor Order:</label>
                        <select name="nomor_order" id="nomor_order" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">-- Pilih Nomor Order --</option>
                            @foreach ($orderMaterials as $order)
                                <option value="{{ $order->nomor_order }}">{{ $order->nomor_order }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <!-- Nama Material (Readonly) -->
                    <div class="flex flex-col">
                        <label for="nama_material" class="font-medium text-gray-700 mb-2">Nama Material:</label>
                        <input type="text" name="nama_material" id="nama_material" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
    
                    <!-- Jumlah Order (Readonly) -->
                    <div class="flex flex-col">
                        <label for="jumlah_order" class=" font-medium text-gray-700 mb-2">Jumlah Order:</label>
                        <input type="text" name="jumlah_order" id="jumlah_order" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                    </div>
    
                    <!-- Stok -->
                    <div class="flex flex-col">
                        <label for="stok" class=" font-medium text-gray-700 mb-2">Stok:</label>
                        <select name="stok" id="stok" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">-- Pilih Stok --</option>
                            @foreach ($materialProyek as $material)
                                <option value="{{ $material->stok }}">{{ $material->stok }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <!-- Nama Proyek -->
                    <div class="flex flex-col">
                        <label for="nama_proyek" class=" font-medium text-gray-700 mb-2">Nama Proyek:</label>
                        <select name="nama_proyek" id="nama_proyek" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">-- Pilih Proyek --</option>
                            @foreach ($proyek as $pr)
                                <option value="{{ $pr->nama_proyek }}">{{ $pr->nama_proyek }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="flex flex-col">
                        <label for="jumlah_digunakan" class="font-medium text-gray-700 mb-2">Jumlah Digunakan :</label>
                        <select name="jumlah_digunakan" id="jumlah_digunakan" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">-- Pilih Proyek --</option>
                            @foreach ($detailProyek as $dp)
                                <option value="{{ $dp->jumlah_digunakan }}">{{ $dp->jumlah_digunakan }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    {{-- <!-- Jumlah Digunakan -->
                    <div class="flex flex-col">
                        <label for="jumlah_digunakan" class="font-medium text-gray-700 mb-2">Jumlah Digunakan:</label>
                        <input type="text" name="jumlah_digunakan" id="jumlah_digunakan" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div> --}}
    
                    <!-- Keterangan -->
                    <div class="flex flex-col">
                        <label for="keterangan" class="font-medium text-gray-700 mb-2">Keterangan:</label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
    
                    <!-- Tombol Submit -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 w-full">
                            Simpan
                        </button>
                    </div>
                </form>
                <div class="mt-3 mb-3 text-center">
                    <a href="{{ route('admin.problem.index') }}" class="btn btn-outline-secondary w-25">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#nomor_order').change(function () {
                const nomorOrder = $(this).val();

                if (nomorOrder) {
                    $.ajax({
                        url: `/problem/get-order-details/${nomorOrder}`,
                        method: 'GET',
                        success: function (response) {
                            $('#nama_material').val(response.nama_material);
                            $('#jumlah_order').val(response.jumlah_order);
                        },
                        error: function () {
                            alert('Gagal mengambil data untuk Nomor Order.');
                        }
                    });
                } else {
                    $('#nama_material').val('');
                    $('#jumlah_order').val('');
                }
            });

            // // Optional: Add logic to update jumlah_digunakan based on proyek
            // $('#nama_proyek').change(function () {
            //     const proyekId = $(this).val();

            //     // You could add AJAX here if you need to get specific data for 'jumlah_digunakan'
            //     // based on the selected proyek (e.g., current material stock or usage in proyek)
            //     if (proyekId) {
            //         // Example: Request data related to the proyek (e.g., related materials or stock)
            //         // You can fetch data from your server and update jumlah_digunakan accordingly.
            //     }
            // });
        });
    </script>
</body>
</html>
@endsection
