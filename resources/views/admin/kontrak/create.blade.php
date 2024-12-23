@extends('admin.app')
@section('title', 'Kontrak')
@section('navbar', 'Tambah Kontrak')

@section('content')
<div>
    <div class="container mx-auto">

        <!-- Form untuk menambahkan kontrak baru -->
         <div class="bg-white p-8 rounded-lg shadow-md" style="max-width:40rem; margin: auto;">
            <h3 class="fs-3 fw-bold mb-3 text-center">Tambah Kontrak Baru</h3>
            <form action="{{ route('admin.kontrak.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="mb-4">
                    <label for="tanggal_mulai" class="block text-gray-700 font-bold mb-2">Tanggal Mulai:</label>
                    <input type="date" name="tanggal_mulai" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                </div>
                
                <div class="mb-4">
                    <label for="tanggal_selesai" class="block text-gray-700 font-bold mb-2">Tanggal Selesai:</label>
                    <input type="date" name="tanggal_selesai" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
                    <textarea name="deskripsi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="bukti_kontrak" class="block text-gray-700 font-bold mb-2">Bukti Kontrak:</label>
                    <input type="file" name="bukti_kontrak" class="form-control" required>
                </div>
                
                <!-- Inputan untuk user_id -->
                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 font-bold mb-2">User ID:</label>
                    <input type="number" name="user_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Masukkan User ID" required>
                </div>
    
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 w-full">
                    Tambah Kontrak
                </button>
            </form>
            <div class="mt-3 text-center">
                <a href="{{ route('admin.kontrak.home') }}" class="btn btn-outline-secondary mb-3 w-25">Kembali</a>
            </div>
         </div>
    </div>
</div>
</html>
@endsection
