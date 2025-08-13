@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit User</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama Lengkap --}}
        <div class="mb-3">
            <label for="name" class="form-label"><strong>Nama Lengkap</strong></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                   id="name" name="name"
                   value="{{ old('name', $user->name) }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label for="email" class="form-label"><strong>Email</strong></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email"
                   value="{{ old('email', $user->email) }}" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Tipe Pengguna --}}
        <div class="mb-3">
            <label><strong>Tipe Pengguna</strong></label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="klien"
                        {{ old('role', $user->role) == 'klien' ? 'checked' : '' }} required>
                    <label class="form-check-label">Klien</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="freelancer"
                        {{ old('role', $user->role) == 'freelancer' ? 'checked' : '' }}>
                    <label class="form-check-label">Freelancer</label>
                </div>
            </div>
        </div>

        {{-- Telepon --}}
        <div class="mb-3">
            <label for="phone" class="form-label"><strong>Nomor Telepon</strong></label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                   id="phone" name="phone"
                   maxlength="13"
                   value="{{ old('phone', $user->phone) }}">
            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Bio --}}
        <div class="mb-3">
            <label for="bio" class="form-label"><strong>Bio (khusus Freelancer)</strong></label>
            <textarea class="form-control @error('bio') is-invalid @enderror"
                      id="bio" name="bio" rows="3">{{ old('bio', $user->bio) }}</textarea>
            @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Gambar Profil --}}
        <div class="mb-3">
            <label for="profile_picture" class="form-label"><strong>Gambar Profil</strong></label>
            @if ($user->profile_picture)
    <div class="mb-2">
        <img src="{{ asset('storage/' . $user->profile_picture) }}" 
             alt="Profile" width="100">
    </div>
@endif

            <input type="file" class="form-control-file @error('profile_picture') is-invalid @enderror"
                   id="profile_picture" name="profile_picture">
            @error('profile_picture') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Tombol --}}
        <div class="mt-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
