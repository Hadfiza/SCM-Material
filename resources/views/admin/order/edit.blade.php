@extends('admin.app')
@section('title', 'Edit Order Material')
@section('navbar','Edit Order')

@section('content')
<div>
    <div class="container mx-auto">

        <!-- Form untuk mengedit order material -->
         <div class="bg-white p-8 rounded-lg shadow-md" style="max-width:40rem; margin: auto;">
            <h3 class="fs-3 fw-bold mb-3 text-center">Edit Order Material</h3>
            <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <!-- Material -->
                <div class="mb-4">
                    <label for="material_id" class="block text-gray-700 font-bold mb-2">Material:</label>
                    <select name="material_id" id="material_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                        <option value="" disabled>Pilih Material</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}" {{ $material->id == $order->material_id ? 'selected' : '' }}>
                                {{ $material->nama_material }} -
                                {{ $material->pemasok ? $material->pemasok->nama_pemasok : 'Pemasok Tidak Ditemukan' }}
                            </option>
                        @endforeach
                    </select>
                    @error('material_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Jumlah Order -->
                <div class="mb-4">
                    <label for="jumlah_order" class="block text-gray-700 font-bold mb-2">Jumlah Order:</label>
                    <input type="number" name="jumlah_order" id="jumlah_order"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           value="{{ old('jumlah_order', $order->jumlah_order) }}" required>
                    @error('jumlah_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="satuan" class="block text-gray-700 font-bold mb-2">Satuan</label>
                    <select class="form-control" id="satuan" name="satuan" required>
                        <option value="unit" {{ old('satuan', $order->satuan) == 'unit' ? 'selected' : '' }}>Unit</option>
                        <option value="box" {{ old('satuan', $order->satuan) == 'box' ? 'selected' : '' }}>Box</option>
                    </select>
                </div>
                
    
                <!-- Tanggal Order -->
                <div class="mb-4">
                    <label for="tanggal_order" class="block text-gray-700 font-bold mb-2">Tanggal Order:</label>
                    <input type="date" name="tanggal_order" id="tanggal_order"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           value="{{ old('tanggal_order', $order->tanggal_order) }}" required>
                    @error('tanggal_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Keterangan -->
                <div class="mb-4">
                    <label for="keterangan" class="block text-gray-700 font-bold mb-2">Keterangan:</label>
                    <input type="text" name="keterangan" id="keterangan"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           value="{{ old('keterangan', $order->keterangan) }}" required>
                    @error('keterangan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga Satuan -->
                <!-- Harga Satuan -->
                <div class="mb-4">
                    <label for="harga_satuan" class="block text-gray-700 font-bold mb-2">Harga Satuan:</label>
                    <input type="text" name="harga_satuan" id="harga_satuan"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                        value="{{ old('harga_satuan', $order->harga_satuan) }}" readonly>
                    @error('harga_satuan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Tombol Simpan -->
                <button type="submit"
                        class="bg-yellow-400 text-dark px-6 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition duration-300 w-full">
                    Simpan Perubahan
                </button>
            </form>
            <div class="mt-3 text-center">
                <a href="{{ route('admin.order') }}" class="btn btn-outline-secondary mb-3 w-25">Kembali</a>
            </div>
         </div>
    </div>
</div>

</html>
@endsection
