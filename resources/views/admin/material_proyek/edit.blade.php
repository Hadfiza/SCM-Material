<!-- resources/views/admin/material_proyek/edit.blade.php -->

@extends('admin.app')
@section('navbar','Edit Material Proyek')

@section('content')
<div class="container">
    <div class="card" style="width: 40rem; margin: auto">
        <div class="card-body px-4">
            <h1 class="fs-3 fw-bold text-center mb-3">Edit Material Proyek</h1>
            <!-- resources/views/admin/material_proyek/edit.blade.php -->
            <form method="POST" action="{{ route('material_proyek.update', $material->id) }}">
                @csrf
                @method('PUT')
            
                <div class="mt-3">
                    <label class="form-label" for="nama_material">Nama Material</label>
                    <input type="text" name="nama_material" class="form-control" value="{{ old('nama_material', $material->nama_material) }}" required>
                </div>
            
                <div class="form-group mt-3">
                    <label class="form-label" for="stok">Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $material->stok) }}" required>
                </div>
            
                <div class="form-group mt-3">
                    <label class="form-label" for="harga_satuan">Harga Satuan</label>
                    <input type="number" name="harga_satuan" class="form-control" value="{{ old('harga_satuan', $material->harga_satuan) }}" required>
                </div>
            
                <div class="form-group mt-3">
                    <label class="form-label" for="proyek_id">Nama Proyek</label>
                    <select name="proyek_id" class="form-control" required>
                        <option value="" disabled>Pilih Proyek</option>
                        @foreach($proyekList as $proyek)
                            <option value="{{ $proyek->id }}" {{ $proyek->id == $material->proyek_id ? 'selected' : '' }}>
                                {{ $proyek->nama_proyek }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                <button type="submit" class="btn btn-warning mt-3 mb-3 w-100">Update</button>
            </form>
            <div class="mb-3 text-center">
                <a href="{{ route('material_proyek.index') }}" class=" btn btn-outline-secondary w-25">Kembali</a>
            </div>
        </div>
    </div>


</div>
@endsection
