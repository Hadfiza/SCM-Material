@extends('admin.app')
@section('title', 'Pengiriman')
@section('navbar', 'Pengiriman')

@section('content')
    <!-- Content -->
    <div>
        <!-- Pengiriman -->
         <h1 class="fs-3 fw-bold text-center mt-4 mb-3">Daftar Pengiriman</h1>
         <div class="overflow-x-auto">
             <table  class="min-w-full bg-white">
                 <thead class="bg-gray-800 text-white">
                     <tr class="divide-x divide-gray-200">
                         <th class="py-3 px-6 text-left rounded-ss-lg">ID</th>
                         <th class="py-3 px-6 text-left">Order ID</th>
                         <th class="py-3 px-6 text-left">Tanggal Kirim</th>
                         <th class="py-3 px-6 text-left">Tanggal Selesai</th>
                         <th class="py-3 px-6 text-left rounded-se-lg">Status Pengiriman</th>
                     </tr>
                 </thead>
                 <tbody class="bg-white divide-y divide-gray-200">
                     @forelse ($pengiriman as $item)
                         <tr class="divide-x divide-gray-200  hover:bg-gray-100 transition duration-300">
                             <td class="py-3 px-6 text-left">{{ $item->id }}</td>
                             <td class="py-3 px-6 text-left">{{ $item->order_id }}</td>
                             <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('d-m-Y H:i:s') }}</td>
                             <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y H:i:s') }}</td>
                             <td class="py-3 px-6 text-left">{{ $item->status_pengiriman }}</td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="6" class="text-center py-3 px-6">Tidak ada data pengiriman ditemukan.</td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
    </div>
@endsection
