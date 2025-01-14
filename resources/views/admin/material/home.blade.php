@extends('admin.app')
@section('title', 'Daftar Material')
@section('navbar', 'Material Pemasok')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-roboto">
    <div class="container px-4">
        <div class="bg-gray-100">
            <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex justify-start space-x-8 border-b-2 border-gray-200">
                    <a href="{{ route('admin.material') }}" class="py-4 px-1 border-b-2 border-black font-medium text-gray-900">Material Pemasok</a>
                    <a href="{{ route('admin.order') }}" class="py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">Order</a>
                </div>
            </div>
        </div>

        <!-- Button to add material -->


        <!-- Material List -->
        <div class="flex justify-between items-center mt-4 mb-3">
            <h3 class="text-2xl font-semibold text-gray-800">Daftar Material</h3>
        </div>
        <div class="bg-white shadow-md rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr class="divide-x divide-gray-200">
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4  uppercase tracking-wider rounded-ss-lg">ID</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4  uppercase tracking-wider">Nama Material</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4  uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4  uppercase tracking-wider">Harga Satuan</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4  uppercase tracking-wider">Jenis Material</th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-sm leading-4  uppercase tracking-wider rounded-se-lg">Pemasok</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($materials as $material)
                            <tr class="divide-x divide-gray-200  hover:bg-gray-100 transition duration-300">
                                <td class="px-6 py-4 text-sm">{{ $material->id }}</td>
                                <td class="px-6 py-4 text-sm">{{ $material->nama_material }}</td>
                                <td class="px-6 py-4 text-sm">{{ $material->stok }} pcs </td>
                                <td class="px-6 py-4 text-sm">{{ $material->harga_satuan }}</td>
                                <td class="px-6 py-4 text-sm">{{ $material->jenis_material }}</td>
                                <td class="px-6 py-4 text-sm">{{ $material->pemasok->nama_pemasok }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
   
</div> 

</body>
</html>
@endsection
