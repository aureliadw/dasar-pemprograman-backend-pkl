@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar User</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tipe Pengguna</th>
                <th>No. Telepon</th>
                <th>Bio</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto Profil" width="100">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role ?? '-') }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>{{ $user->bio ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
