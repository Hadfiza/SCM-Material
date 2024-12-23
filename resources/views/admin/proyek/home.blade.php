@extends('admin.app')
@section('title', 'Material')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Proyek')

@section('content')
    <div class="container">
        <!-- Main Content -->
        <div class="flex-grow-1">
            
            <div class="bg-gray-100 mb-3">
                <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-start space-x-8 border-b-2 border-gray-200">
                        <a href="{{ route('admin.proyek') }}" class="py-4 px-1 border-b-2 border-black font-medium text-gray-900">Proyek</a>
                        <a href="{{ route('material_proyek.index') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Material Proyek</a>
                        <a href="{{ route('admin.order.trends') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Trends Order Material</a>
                        <a href="{{ route('admin.problem.index') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Problem</a>
                    </div>
                </div>
            </div>
            <!-- <div class="d-flex justify-content-start align-items-center mb-4 w-100 gap-5" style="background-color: #f8f9fa; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 5px;">
                            <a href="{{ route('admin.proyek') }}" class="{{ Request::is('admin/proyek*') ? 'border-black' : '' }} py-4 px-1 border-b-2 font-medium text-gray-900 hover:text-gray-700 hover:border-gray-300"
                             style=" transition: color 0.3s;">
                                Proyek
                            </a>
                            <a href="{{ route('material_proyek.index') }}"
                                class="{{ Request::is('material_proyek*') ? 'border-black' : '' }} py-4 px-1 border-b-2 font-medium text-gray-900 hover:text-gray-700 hover:border-gray-300"
                                 style=" transition: color 0.3s;">
                                Material Proyek
                            </a>
            
                            <a href="{{ route('admin.order.trends') }}" class="{{ route('admin.order.trends') }}" class="{{ Request::is('admin/order/trends*') ? 'border-black' : '' }} py-4 px-1 border-b-2 font-medium text-gray-900 hover:text-gray-700 hover:border-gray-300"
                                 style=" transition: color 0.3s;">
                                Trends Order Material
                            </a>
                           
                            <a href="{{ route('admin.problem.index') }}" class="{{ route('admin.problem.index') }}" class="{{ Request::is('admin/problem*') ? 'border-black' : '' }} py-4 px-1 border-b-2 font-medium text-gray-900 hover:text-gray-700 hover:border-gray-300"
                                 style=" transition: color 0.3s;">
                                Problem
                            </a>
                        </div> -->

            <!-- Tombol Tambah -->
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('admin.proyek.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>Tambah Proyek
                </a>
            </div>

            <!-- Proyek Card -->
            <div class="row g-3">
                @foreach ($proyek as $item)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                    <div class="card shadow" data-aos="zoom-in" data-aos-delay="200">
                            <div class="card-header bg-white ms-2">
                                    <table>
                                        <tr>
                                            <th class=" card-title text-lg mt-2">Proyek : </th>
                                            <td class="text-lg ps-2" style="color: #cb8742;"> {{ $item->nama_proyek }}</td>
                                        </tr>
                                    </table>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th class="fw-semibold text-lg">Lokasi:</th>
                                            <td class="text-lg" style="color: #cb8742;">{{ $item->lokasi }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-semibold text-lg">Status:</th>
                                            <td class="text-lg" style="color: #cb8742;">{{ $item->status }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-semibold text-lg">Anggaran:</th>
                                            <td class="text-lg" style="color: #cb8742;">{{ $item->anggaran_proyek }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-semibold text-lg">Total Penggunaan:</th>
                                            <td class="text-lg" style="color: #cb8742;">{{ $analisis->isNotEmpty() ? isset($analisis->firstWhere('id', $item->id)['total_penggunaan']) ? $analisis->firstWhere('id', $item->id)['total_penggunaan'] : '-' : '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-semibold text-lg">Analisis:</th>
                                            <td class="text-lg" style="color: #cb8742;">{{ $analisis->isNotEmpty() ? isset($analisis->firstWhere('id', $item->id)['analisis']) ? $analisis->firstWhere('id', $item->id)['analisis'] : '-' : '-' }}</td>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('admin.proyek.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger rounded-circle btn-sm">
                                                <i class="bi bi-trash3 text-white"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.proyek.edit', $item->id) }}"
                                            class="btn btn-warning rounded-circle btn-sm">
                                            <i class="bi bi-pencil-square text-white"></i>
                                        </a>
                                    </div>
                                    <a href="{{ route('admin.detail_proyek.index', $item->id) }}"
                                        class="btn btn-outline-secondary btn-sm">
                                        view <i class="bi bi-arrow-right text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
