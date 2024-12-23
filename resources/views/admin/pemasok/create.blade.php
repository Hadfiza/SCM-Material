@extends('admin.app')
@section('title', 'Pemasok')
@section('navbar', 'Tambah Pemasok')

@section('content')
<div>
    <div class="container mx-auto" style="max-width: 40rem;">

        <!-- Form untuk menambahkan pemasok baru -->
         <div class="bg-white p-8 rounded-lg shadow-md">
             <h3 class="fs-3 fw-bold text-center mb-3">Tambah Pemasok Baru</h3>
             <form action="{{ route('admin.pemasok.store') }}" method="POST">
                 @csrf
                 <div class="mb-4">
                     <label for="nama_pemasok" class="block text-gray-700 font-bold mb-2">Nama Pemasok:</label>
                     <input type="text" name="nama_pemasok" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                 </div>
                 
                 <div class="mb-4">
                     <label for="alamat" class="block text-gray-700 font-bold mb-2">Alamat:</label>
                     <textarea name="alamat" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required></textarea>
                 </div>
                 
                 <div class="mb-4">
                     <label for="kontak" class="block text-gray-700 font-bold mb-2">Kontak:</label>
                     <input type="text" name="kontak" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
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
                 
                 {{-- <div class="mb-4">
                     <label for="rating_pemasok" class="block text-gray-700 font-bold mb-2">Rating Pemasok:</label>
                     <input type="number" name="rating_pemasok" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                 </div> --}}
                 
                 <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow-lg transition duration-300 w-full">
                     Tambah Pemasok
                 </button>
             </form>
             <div class="mt-3 text-center">
                <a href="{{ route('admin.pemasok') }}" class="btn btn-outline-secondary mb-3 w-25">Kembali</a>
            </div>
         </div>
    </div>
</div>
</html>
@endsection
