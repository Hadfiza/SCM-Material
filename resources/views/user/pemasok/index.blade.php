@extends('layouts.app')
@section('navbar', 'Pemasok')

@section('title', 'Daftar Pemasok')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemasok</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<h1 class="text-center fs-3 fw-semibold mt-3">Daftar Pemasok</h1>

<a href="{{ route('user.pemasok.create') }}" class="btn btn-primary mb-3">Tambah Pemasok</a>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr class="divide-x divide-gray-200">
                <th class="py-3 px-4 uppercase font-semibold text-sm rounded-ss-lg">Nama Pemasok</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Kontak</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Kontrak</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Rating</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm rounded-se-lg">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($pemasok as $pemasok)
                <tr class="divide-x divide-gray-200 hover:bg-gray-100 transition duration-300">
                    <td class="py-3 px-4">{{ $pemasok->nama_pemasok }}</td>
                    <td class="py-3 px-4">{{ $pemasok->alamat }}</td>
                    <td class="py-3 px-4">{{ $pemasok->kontak }}</td>
                    <td class="py-3 px-4">{{ $pemasok->kontrak ? $pemasok->kontrak->deskripsi : '-' }}</td>
                    <td class="py-3 px-4">{{ $pemasok->rating_pemasok }}</td>
                    <td class="py-3 px-4 flex space-x-2">
                        <!-- Aksi Edit dan Hapus -->
                        <a href="{{ route('user.pemasok.edit', $pemasok->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded text-sm shadow-md transition duration-300">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('user.pemasok.destroy', $pemasok->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded text-sm shadow-md transition duration-300">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
