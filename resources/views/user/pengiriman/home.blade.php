@extends('layouts.app')
@section('title', 'Pengiriman')
@section('navbar', 'Pengiriman')

@section('content')
    <!-- Content -->
    <div>
        <div class="d-flex justify-content-between mt-4 mb-2">
            <h1 class="fs-3 fw-bold text-center">Daftar Pengiriman</h1>
            <!-- Tambah -->
            <div>
                <a href="{{ route('user.pengiriman.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-2"></i>Tambah Pengiriman</a>
            </div>
        </div>
        <!-- Pengiriman -->
         <div class="overflow-x-auto">
             <table class="min-w-full bg-white">
                 <thead class="bg-gray-800 text-white">
                     <tr class="divide-x divide-gray-200">
                         <th class="py-3 px-6 text-left rounded-ss-lg">ID</th>
                         <th class="py-3 px-6 text-left">Nomor Order</th>
                         <th class="py-3 px-6 text-left">Tanggal Kirim</th>
                         <th class="py-3 px-6 text-left">Tanggal Selesai</th>
                         <th class="py-3 px-6 text-left">Status Pengiriman</th>
                         <th class="py-3 px-6 text-left rounded-se-lg">Aksi</th>
                     </tr>
                 </thead>
                 <tbody class="bg-white divide-y divide-gray-200">
                     @forelse ($pengiriman as $item)
                         <tr class="divide-x divide-gray-200  hover:bg-gray-100 transition duration-300">
                             <td class="py-3 px-6 text-left">{{ $item->id }}</td>
                             <td class="py-3 px-6 text-left">{{ $item->orderMaterial->nomor_order }}</td>
                             <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('d-m-Y H:i:s') }}</td>
                             <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y H:i:s') }}</td>
                             <td class="py-3 px-6 text-left">{{ $item->status_pengiriman }}</td>
                             <td class="py-3 px-6 text-left">
                                 <!-- Aksi Edit dan Hapus -->
                                 <a href="{{ route('user.pengiriman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                 <form action="{{ route('user.pengiriman.destroy', $item->id) }}" method="POST" style="display:inline;">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengiriman ini?')">Hapus</button>
                                 </form>
                             </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="6" class="text-center py-3 px-6 text-left">Tidak ada data pengiriman ditemukan.</td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
    </div>
@endsection
