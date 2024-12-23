@extends('layouts.app')
@section('title', 'Edit Material')
@section('navbar', 'Edit Material')

@section('content')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Material</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-roboto">
    <div class="container mx-auto px-4" style="max-width: 40rem;">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h3 class="fs-3 fw-bold mb-3 text-center">Edit Material</h3>

            <!-- Form to edit material -->
            <form action="{{ route('user.material.update', $material->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Material -->
                <div class="mb-6">
                    <label for="nama_material" class="block text-gray-700 font-medium mb-2">Nama Material:</label>
                    <input type="text" name="nama_material"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('nama_material', $material->nama_material) }}" required>
                </div>

                <!-- Stok -->
                <div class="mb-6">
                    <label for="stok" class="block text-gray-700 font-medium mb-2">Stok:</label>
                    <input type="number" name="stok"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('stok', $material->stok) }}" required>
                </div>

                <!-- Harga Satuan -->
                <div class="mb-6">
                    <label for="harga_satuan" class="block text-gray-700 font-medium mb-2">Harga Satuan:</label>
                    <input type="number" name="harga_satuan"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('harga_satuan', $material->harga_satuan) }}" required>
                </div>

                <!-- Jenis Material -->
                <div class="mb-6">
                    <label for="jenis_material" class="block text-gray-700 font-medium mb-2">Jenis Material:</label>
                    <input type="text" name="jenis_material"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('jenis_material', $material->jenis_material) }}" required>
                </div>

                <!-- Pemasok ID (hidden) -->
                <input type="hidden" value="{{ old('pemasok_id', $material->pemasok_id) }}" name="pemasok_id">

                <button type="submit"
                    class="bg-yellow-500 text-dark px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 w-full">Simpan
                    Perubahan</button>
            </form>
            <div class="text-center mt-3 mb-3">
                <a href="{{ route('user.material') }}" class="btn btn-outline-secondary w-25">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
