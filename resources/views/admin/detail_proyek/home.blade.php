@extends('admin.app')
@section('title', 'Daftar Detail Proyek')
@section('navbar','Detail Proyek')

@section('content')
<div>

    <!-- Tombol untuk kembali ke halaman sebelumnya -->
    <p>
        <a href="{{ route('admin.proyek', ['proyek_id' => $proyek_id]) }}" class="btn btn-outline-secondary mb-3">
            Kembali
        </a>
    </p>

    <div class="d-flex flex-row justify-content-between">
        <!-- Tombol untuk menambahkan proyek-->
         <div>
             <a href="{{ route('admin.detail_proyek.create', ['proyek_id' => $proyek_id]) }}" class="btn btn-primary">
                 Tambah Detail Proyek
             </a>
         </div>

        <!-- Form Filter Tanggal -->
         <div class="mb-3">
             <form action="{{ route('admin.detail_proyek.index', ['proyek_id' => $proyek_id]) }}" method="GET" class="form-inline d-flex flex-row">
                <div class="d-flex flex-row me-2">
                    <label for="start_date" class="mt-2">Dari:</label>
                    <input type="date" name="start_date" value="{{ request()->get('start_date') }}" class="form-control mx-2">
                </div>
                <div class="d-flex flex-row">
                    <label for="end_date" class="mt-2">Hingga:</label>
                    <input type="date" name="end_date" value="{{ request()->get('end_date') }}" class="form-control mx-2">
                </div>
                 <button type="submit" class="btn btn-primary">Filter</button>
             </form>
         </div>
    </div>


    <!-- Daftar Proyek -->
     <div class="d-flex flex-row justify-content-between mt-3">
        <div>
            <h3 class="fs-4 fw-bold">Daftar Detail Proyek</h3>
        </div>
         <!-- Form Ekspor PDF -->
        <div class="mb-2">
            <form action="{{ route('admin.detail_proyek.exportPDF', ['proyek_id' => $proyek_id]) }}" method="GET" class="form-inline">
                <input type="hidden" name="start_date" value="{{ request()->get('start_date') }}">
                <input type="hidden" name="end_date" value="{{ request()->get('end_date') }}">
    
                <div class="d-flex flex-row justify-content-between">
                    <button type="submit" class="btn btn-danger text-nowrap">Ekspor ke PDF</button>
                </div>
            </form>
        </div>
     </div>
     <div class="overflow-x-auto">
         <table class="min-w-full bg-white ">
             <thead class="bg-gray-800 text-white">
                 <tr class="divide-x divide-gray-200 ">
                     <th class="py-3 px-6 text-left rounded-ss-lg" >ID</th>
                     <th class="py-3 px-6 text-left">Proyek ID</th>
                     <th class="py-3 px-6 text-left">Material</th>
                     <th class="py-3 px-6 text-left">Jumlah Digunakan</th>
                     <th class="py-3 px-6 text-left">Harga Satuan</th>
                     <th class="py-3 px-6 text-left">Tanggal Digunakan</th>
                     <th class="py-3 px-6 text-left">Keterangan</th>
                     <th class="py-3 px-6 text-left">Biaya Penggunaan</th>
                     <th class="py-3 px-6 text-left rounded-se-lg">Aksi</th>
                 </tr>
             </thead>
             <tbody class="bg-white divide-y divide-gray-200">
                 @foreach ($detail_proyek as $item)
                     <tr class="divide-x divide-gray-200  hover:bg-gray-100 transition duration-300">
                         <td class="px-6 py-3 text-sm">{{ $item->id }}</td>
                         <!-- Menampilkan nama_material yang terkait -->
                         <td class="px-6 py-3 text-sm">{{ $item->proyek_id }} - {{ $item->proyek->nama_proyek ?? 'Tidak ada nama proyek' }}</td>
                         <td class="px-6 py-3 text-sm">{{ $item->materialProyek->nama_material ?? 'Tidak ada material' }}</td>
                         <td class="px-6 py-3 text-sm">{{ $item->jumlah_digunakan }}</td>
                         <td class="px-6 py-3 text-sm">{{ $item->materialProyek->harga_satuan ?? 'Tidak ada harga satuan' }}</td>
                         <td class="px-6 py-3 text-sm">{{ $item->tanggal_digunakan }}</td>
                         <td class="px-6 py-3 text-sm">{{ $item->keterangan }}</td>
                         <td class="px-6 py-3 text-sm">{{ $item->biaya_penggunaan }}</td>
                         <td class="px-6 py-3 text-sm">
                             <!-- Aksi Edit dan Hapus -->
                             <a href="{{ route('admin.detail_proyek.edit', ['proyek_id' => $proyek_id, 'id' => $item->id]) }}" class="btn btn-warning btn-sm">
                                 Edit
                             </a>
     
                             <form action="{{ route('admin.detail_proyek.destroy', ['proyek_id' => $proyek_id, 'id' => $item->id]) }}" method="POST" style="display:inline;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                             </form>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>

    <!-- Pagination Links -->
     <div class="mt-5">
         <div class="d-flex justify-content-center">
                 @if ($detail_proyek->count() > 0)
                     {{ $detail_proyek->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                 @endif
         </div>
     </div>



</div>
@endsection
