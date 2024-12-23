@extends('admin.app')
@section('title', 'Tambah Order Material')
@section('navbar', 'Tambah Order')

@section('content')

<div>
    <div class="container mx-auto">

        <!-- Form untuk menambahkan order material -->
         <div class="bg-white p-8 rounded-lg shadow-md" style="max-width:40rem; margin: auto;">
            <h3 class="fs-3 fw-bold mb-3 text-center">Tambah Order Material</h3>

            <form action="{{ route('admin.order.store') }}" method="POST" >
                @csrf
    
                <!-- Material -->
                <div class="mb-4">
                    <label for="material_id" class="block text-gray-700 font-bold mb-2">Material:</label>
                    <select name="material_id" id="material_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                        <option value="" disabled selected>Pilih Material</option>
                        @foreach ($materials as $material)
                            <option value="{{ $material->id }}" data-harga="{{ $material->harga_satuan }}">
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
                           value="{{ old('jumlah_order') }}" required>
                    @error('jumlah_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="satuan" class="block text-gray-700 font-bold mb-2">Satuan</label>
                    <select id="satuan" name="satuan" class="w-full p-2 border rounded form-control" required>
                        <option value="unit">Unit</option>
                        <option value="box">Box</option>
                    </select>
                </div>
                
                <!-- Tanggal Order -->
                <div class="mb-4">
                    <label for="tanggal_order" class="block text-gray-700 font-bold mb-2">Tanggal Order:</label>
                    <input type="date" name="tanggal_order" id="tanggal_order"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           value="{{ old('tanggal_order') }}" required>
                    @error('tanggal_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Keterangan -->
                <div class="mb-4">
                    <label for="keterangan" class="block text-gray-700 font-bold mb-2">Keterangan:</label>
                    <input type="text" name="keterangan" id="keterangan"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                           value="{{ old('keterangan') }}" required>
                    @error('keterangan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Harga Satuan (Akan terisi otomatis) -->
                <!-- Harga Satuan (Akan terisi otomatis) -->
                <div class="mb-4">
                    <label for="harga_satuan" class="block text-gray-700 font-bold mb-2">Harga Satuan</label>
                    <input type="number" id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan') }}" class="form-input mt-1 block w-full" readonly>
                </div>
    
                <!-- Tombol Simpan -->
                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 w-full">
                    Tambah Order
                </button>
            </form>
            <div class="mt-3 text-center">
                <a href="{{ route('admin.order') }}" class="btn btn-outline-secondary mb-3 w-25">Kembali</a>
            </div>
         </div>

    </div>

    <script>
       document.getElementById('material_id').addEventListener('change', function () {
    var hargaSatuan = this.options[this.selectedIndex].getAttribute('data-harga');
    document.getElementById('harga_satuan').value = hargaSatuan ? hargaSatuan : '';
});

    </script>
</div>

</html>
@endsection
