@extends('admin.app')
@section('title', 'Edit Problem')
@section('navbar', 'Edit Problem')

@section('content')
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Problem</title>
    <!-- Include TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container">
        <div class="card shadow" style="width: 40rem; margin: auto;">
            <div class="card-body px-4">
                <h1 class="fs-3 fw-bold text-center">Edit Problem</h1>
    
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif
    
                <form action="{{ route('admin.problem.update', $problem->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
    
                    <div class="flex flex-col space-y-6">
                        <!-- Nomor Order -->
                        <div class="flex flex-col">
                            <label for="nomor_order" class="font-medium text-gray-700 mb-2">Nomor Order:</label>
                            <select name="nomor_order" id="nomor_order" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                @foreach ($orderMaterials as $order)
                                    <option value="{{ $order->nomor_order }}" {{ $problem->nomor_order == $order->nomor_order ? 'selected' : '' }}>{{ $order->nomor_order }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <!-- Nama Material (Readonly) -->
                        <div class="flex flex-col">
                            <label for="nama_material" class="font-medium text-gray-700 mb-2">Nama Material:</label>
                            <input type="text" name="nama_material" id="nama_material" value="{{ $problem->nama_material }}" class="border border-gray-300 p-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                        </div>
    
                        <!-- Jumlah Order (Readonly) -->
                        <div class="flex flex-col">
                            <label for="jumlah_order" class="font-medium text-gray-700 mb-2">Jumlah Order:</label>
                            <input type="text" name="jumlah_order" id="jumlah_order" value="{{ $problem->jumlah_order }}" class="border border-gray-300 p-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>
                        </div>
    
                        <!-- Stok -->
                        <div class="flex flex-col">
                            <label for="stok" class="font-medium text-gray-700 mb-2">Stok:</label>
                            <select name="stok" id="stok" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                @foreach ($materialProyek as $material)
                                    <option value="{{ $material->stok }}" {{ $problem->stok == $material->stok ? 'selected' : '' }}>{{ $material->stok }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <!-- Nama Proyek -->
                        <div class="flex flex-col">
                            <label for="nama_proyek" class="font-medium text-gray-700 mb-2">Nama Proyek:</label>
                            <select name="nama_proyek" id="nama_proyek" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                @foreach ($proyek as $pr)
                                    <option value="{{ $pr->nama_proyek }}" {{ $problem->nama_proyek == $pr->nama_proyek ? 'selected' : '' }}>{{ $pr->nama_proyek }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <!-- Jumlah Digunakan -->
                        <div class="flex flex-col">
                            <label for="jumlah_digunakan" class=" font-medium text-gray-700 mb-2">Jumlah Digunakan:</label>
                            <input type="text" name="jumlah_digunakan" id="jumlah_digunakan" value="{{ $problem->jumlah_digunakan }}" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
    
                        <!-- Keterangan -->
                        <div class="flex flex-col">
                            <label for="keterangan" class=" font-medium text-gray-700 mb-2">Keterangan:</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $problem->keterangan }}</textarea>
                        </div>
                    </div>
    
                    <!-- Tombol Submit -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-yellow-400 text-dark px-6 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition duration-300 w-full">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
                <div class="mt-3 mb-3 text-center">
                    <a href="{{ route('admin.problem.index') }}" class="btn btn-outline-secondary w-25">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
