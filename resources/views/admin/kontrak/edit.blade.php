@extends('admin.app')
@section('title', 'Kontrak')
@section('navbar', 'Edit Kontrak')

@section('content')
<div>
    <div class="container mx-auto">
        
        <!-- Form untuk mengedit kontrak -->
         <div class="bg-white p-8 rounded-lg shadow-md" style="max-width:40rem; margin: auto;">
            <h3 class="fs-3 fw-bold mb-3 text-center">Edit Kontrak</h3>
            <form action="{{ route('admin.kontrak.update', $kontrak->id) }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
    
                <div class="mb-4">
                    <label for="tanggal_mulai" class="block text-gray-700 font-bold mb-2">Tanggal Mulai:</label>
                    <input type="date" name="tanggal_mulai" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $kontrak->tanggal_mulai }}" required>
                </div>
                
                <div class="mb-4">
                    <label for="tanggal_selesai" class="block text-gray-700 font-bold mb-2">Tanggal Selesai:</label>
                    <input type="date" name="tanggal_selesai" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ $kontrak->tanggal_selesai }}" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
                    <textarea name="deskripsi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>{{ $kontrak->deskripsi }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label for="bukti_kontrak" class="block text-gray-700 font-bold mb-2">Bukti Kontrak:</label>
                    <input type="file" name="bukti_kontrak" class="form-control">
                    <!-- Menampilkan file lama jika tidak ada file baru -->
                    @if($kontrak->bukti_kontrak)
                        <p class="mt-2"><a href="{{ asset('storage/' . $kontrak->bukti_kontrak) }}" target="_blank" class="text-blue-500 hover:underline">Lihat Dokumen Saat Ini</a></p>
                    @endif
                </div>
    
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-dark font-semibold py-2 px-4 rounded shadow-lg transition duration-300 w-full">
                    Simpan Perubahan
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
