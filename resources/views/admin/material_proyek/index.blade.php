@extends('admin.app')
@section('navbar','Material Proyek')

@section('title', 'Daftar Material Proyek')

@section('content')
<div class="container">
            <div class="bg-gray-100 mb-3">
                <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-start space-x-8 border-b-2 border-gray-200">
                        <a href="{{ route('admin.proyek') }}" class="py-4 px-1 border-b-2 border-transparent  font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Proyek</a>
                        <a href="{{ route('material_proyek.index') }}" class="py-4 px-1 border-b-2 border-black font-medium text-gray-900">Material Proyek</a>
                        <a href="{{ route('admin.order.trends') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Trends Order Material</a>
                        <a href="{{ route('admin.problem.index') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Problem</a>
                    </div>
                </div>
            </div>


    <h1 class="text-center fs-3 fw-bold">Daftar Material Proyek</h1>
    <div class="mb-3">
        <form action="{{ route('material_proyek.sync') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Sinkronisasi Material</button>
        </form>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white ">
            <thead class="bg-gray-800 text-white">
                <tr class="divide-x divide-gray-200 ">
                    <th class="py-3 px-6 text-left rounded-ss-lg">No</th>
                    <th class="py-3 px-6 text-left ">Nama Material</th>
                    <th class="py-3 px-6 text-left ">Stok</th>
                    <th class="py-3 px-6 text-left ">Harga Satuan</th>
                    <th class="py-3 px-6 text-left ">Nama Proyek</th>
                    <th class="py-3 px-6 text-left rounded-se-lg">Aksi</th> <!-- Kolom aksi -->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($materials as $material)
                    <tr class="divide-x divide-gray-200  hover:bg-gray-100 transition duration-300">
                        <td class="px-6 py-3 text-sm">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3 text-sm">{{ $material->nama_material }}</td>
                        <td class="px-6 py-3 text-sm">{{ $material->stok }}</td>
                        <td class="px-6 py-3 text-sm">Rp {{ number_format($material->harga_satuan, 2, ',', '.') }}</td>
                        <td class="px-6 py-3 text-sm">{{ $material->proyek->nama_proyek ?? 'Tidak ada proyek' }}</td>
                        <td class="px-6 py-3 text-sm">
                            <a href="{{ route('material_proyek.edit', $material->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center px-6 py-3 text-sm">Belum ada data material proyek.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
