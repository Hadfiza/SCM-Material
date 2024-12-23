@extends('layouts.app')
@section('navbar', 'Tambah Pemasok')

@section('title', 'Tambah Pemasok')

@section('content')
<div class="card " style="width: 30rem; margin: auto;">
        <h1 class="text-center fs-3 fw-bold pt-3">Tambah Pemasok</h1>
        <div class="card-body">
            <form action="{{ route('user.pemasok.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_pemasok" class="form-label">Nama Pemasok</label>
                    <input type="text" name="nama_pemasok" id="nama_pemasok" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" name="kontak" id="kontak" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="kontrak_id" class="form-label">Kontrak</label>
                    <select name="kontrak_id" id="kontrak_id" class="form-control">
                        <option value="">Pilih Kontrak</option>
                        @foreach ($kontrak as $kontrak)
                            <option value="{{ $kontrak->id }}">{{ $kontrak->deskripsi }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
            <div class="mt-3 mb-3 text-center">
                <a href="{{ route('user.pemasok') }}" class="btn btn-outline-secondary w-25">Kembali</a>
            </div>
        </div>
</div>
@endsection
