@extends('admin.app')
@section('title', 'Edit Pemasok')
@section('navbar', 'Edit Pemasok')

@section('content')

<!-- Menampilkan pesan error -->
 @if (session('error'))
    <div class="bg-red-500 text-white p-4 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<div class="card " style="width: 30rem; margin: auto;">
    <h1 class="text-center fs-3 fw-bold pt-3">Edit Pemasok</h1>
    <div class="card-body">
        <!-- Form untuk mengedit pemasok -->
        <form action="{{ route('user.pemasok.update', $pemasok->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_pemasok" class="form-label">Nama Pemasok:</label>
                <input type="text" name="nama_pemasok" class="form-control" value="{{ old('nama_pemasok', $pemasok->nama_pemasok) }}" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" class="form-control" required>{{ old('alamat', $pemasok->alamat) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="kontak" class="form-label">Kontak:</label>
                <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $pemasok->kontak) }}" required>
            </div>
            <div class="mb-4">
                <label for="kontrak_id" class="form-label">Kontrak ID:</label>
                <input type="text" name="kontrak_id" class="form-control" value="{{ old('kontrak_id', $pemasok->kontrak_id) }}" required>
            </div>

            <button type="submit" class="form-control bg-warning">
                Simpan Perubahan
            </button>
        </form>
        <div class="mt-3 mb-3 text-center">
            <a href="{{ route('user.pemasok') }}" class="btn btn-outline-secondary w-25">Kembali</a>
        </div>
    </div>
        
    </div>
</body>
</html>
@endsection
