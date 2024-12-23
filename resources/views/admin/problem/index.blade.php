@extends('admin.app')
@section('title', 'Daftar Problem')
@section('navbar', 'Problem')

@section('content')

<div>
    <div class="container">
            <div class="bg-gray-100 mb-3">
                <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-start space-x-8 border-b-2 border-gray-200">
                        <a href="{{ route('admin.proyek') }}" class="py-4 px-1 border-b-2 border-transparent  font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Proyek</a>
                        <a href="{{ route('material_proyek.index') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Material Proyek</a>
                        <a href="{{ route('admin.order.trends') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Trends Order Material</a>
                        <a href="{{ route('admin.problem.index') }}" class="py-4 px-1 border-b-2  border-black font-medium text-gray-900 ">Problem</a>
                    </div>
                </div>
            </div>



        <!-- Header dengan tombol untuk tambah problem dan judul -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="fs-3 fw-bold mt-3">Daftar Problem</h3>
            <a href="{{ route('admin.problem.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                <i class="fas fa-plus mr-2"></i>Buat Problem Baru
            </a>
        </div>

        <!-- Daftar Problem -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white uppercase text-sm leading-normal">
                    <tr class="divide-x divide-gray-200 ">
                        <th class="py-3 px-6 text-left rounded-ss-lg">ID</th>
                        <th class="py-3 px-6 text-left">Nomor Order</th>
                        <th class="py-3 px-6 text-left">Nama Material</th>
                        <th class="py-3 px-6 text-left">Jumlah Order</th>
                        <th class="py-3 px-6 text-left">Sisa Stok</th>
                        <th class="py-3 px-6 text-left">Nama Proyek</th>
                        <th class="py-3 px-6 text-left">Jumlah Digunakan</th>
                        <th class="py-3 px-6 text-left">Keterangan</th>
                        <th class="py-3 px-6 text-center rounded-se-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($problems as $problem)
                        <tr class="divide-x divide-gray-200  hover:bg-gray-100 transition duration-300">
                            <td class="py-3 px-6 text-left">{{ $problem->id }}</td>
                            <td class="py-3 px-6 text-left">{{ $problem->nomor_order }}</td>
                            <td class="py-3 px-6 text-left">{{ $problem->nama_material }}</td>
                            <td class="py-3 px-6 text-left">{{ $problem->jumlah_order }}</td>
                            <td class="py-3 px-6 text-left">{{ $problem->stok }}</td>
                            <td class="py-3 px-6 text-left">{{ $problem->nama_proyek }}</td>
                            <td class="py-3 px-6 text-left">{{ $problem->jumlah_digunakan }}</td>
                            <td class="py-3 px-6 text-left">{{ $problem->keterangan }}</td>
                            <td class="py-3 px-6 text-center">
                                <!-- Tombol Aksi (edit, hapus, dll) -->
                                <div class="flex item-center justify-center">
                                    <a href="{{ route('admin.problem.edit', $problem->id) }}" class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.problem.destroy', $problem->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-4 transform hover:text-red-500 hover:scale-110">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
