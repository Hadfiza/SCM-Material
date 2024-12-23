@extends('admin.app')
@section('navbar', 'Trend Order Material')

@section('content')
<div class="container">
            <div class="bg-gray-100 mb-3">
                <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-start space-x-8 border-b-2 border-gray-200">
                        <a href="{{ route('admin.proyek') }}" class="py-4 px-1 border-b-2 border-transparent  font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Proyek</a>
                        <a href="{{ route('material_proyek.index') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Material Proyek</a>
                        <a href="{{ route('admin.order.trends') }}" class="py-4 px-1 border-b-2  border-black font-medium text-gray-900 ">Trends Order Material</a>
                        <a href="{{ route('admin.problem.index') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Problem</a>
                    </div>
                </div>
            </div>
    <div class="card shadow p-4">
        <h1 class="text-center fs-3 fw-bold mb-3">Tren Material yang Paling Banyak Dipesan</h1>
        <div class="card-body ove">
            <table class="min-w-full bg-white ">
                <thead class="bg-gray-800 text-white">
                    <tr class="divide-x divide-gray-200 ">
                        <th class="py-3 px-6 text-left rounded-ss-lg">No</th>
                        <th class="py-3 px-6 text-left">Nama Material</th>
                        <th class="py-3 px-6 text-left rounded-se-lg">Total Order</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($trends as $index => $trend)
                        <tr class="divide-x divide-gray-200  hover:bg-gray-100 transition duration-300">
                            <td class="px-6 py-3 text-sm">{{ $index + 1 }}</td>
                            <td class="px-6 py-3 text-sm">{{ $trend->nama_material }}</td>
                            <td class="px-6 py-3 text-sm">{{ $trend->total_order }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
