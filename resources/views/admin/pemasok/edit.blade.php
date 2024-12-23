@extends('admin.app')
@section('title', 'Edit Pemasok')
@section('navbar', 'Edit Pemasok')

@section('content')

<div>
    <div class="container mx-auto">

        <!-- Menampilkan pesan error -->
        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form untuk mengedit pemasok -->
         <div class="bg-white p-8 rounded-lg shadow-md" style="max-width:40rem; margin: auto;">
            <h3 class="fs-3 fw-bold mb-3 text-center">Edit Pemasok</h3>
            <form action="{{ route('admin.pemasok.update', $pemasok->id) }}" method="POST" >
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_pemasok" class="block text-gray-700 font-bold mb-2">Nama Pemasok:</label>
                    <input type="text" name="nama_pemasok" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('nama_pemasok', $pemasok->nama_pemasok) }}" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 font-bold mb-2">Alamat:</label>
                    <textarea name="alamat" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>{{ old('alamat', $pemasok->alamat) }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="kontak" class="block text-gray-700 font-bold mb-2">Kontak:</label>
                    <input type="text" name="kontak" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('kontak', $pemasok->kontak) }}" required>
                </div>
    
                <div class="mb-4">
                    <label for="kontrak_id" class="block text-gray-700 font-bold mb-2">Kontrak</label>
                    <select name="kontrak_id" id="kontrak_id" class="form-control">
                        <option value="">Pilih Kontrak</option>
                        @foreach ($kontrak as $kontrak)
                            <option value="{{ $kontrak->id }}">{{ $kontrak->deskripsi }}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="rating_pemasok" class="block text-gray-700 font-bold mb-2">Rating Pemasok:</label>
                    <input type="number" name="rating_pemasok" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" value="{{ old('rating_pemasok', $pemasok->rating_pemasok) }}" min="0" max="10" required>
                </div>
                <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-dark font-semibold py-2 px-4 rounded shadow-lg transition duration-300 w-full">
                    Simpan Perubahan
                </button>

            </form>
            <div class="mt-3 text-center">
                <a href="{{ route('admin.pemasok') }}" class="btn btn-outline-secondary mb-3 w-25">Kembali</a>
            </div>
         </div>
        
    </div>
</div>
@endsection
