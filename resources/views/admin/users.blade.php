@extends('admin.app')

@section('content')
<div class="container">
    <h1>Kelola Pengguna</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Usertype</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{-- Menampilkan dropdown untuk semua user --}}
                        <form action="{{ url('/admin/users/' . $user->id . '/update') }}" method="POST">
                            @csrf
                            <select name="usertype" class="form-select" {{ auth()->id() === $user->id ? 'disabled' : '' }}>
                                <option value="user" {{ $user->usertype === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                    </td>
                    <td>
                        {{-- Menampilkan aksi --}}
                        @if(auth()->id() === $user->id)
                            <span class="badge bg-secondary">Tidak dapat diubah</span>
                        @else
                            <button type="submit" class="btn btn-primary">Update</button>
                        @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
