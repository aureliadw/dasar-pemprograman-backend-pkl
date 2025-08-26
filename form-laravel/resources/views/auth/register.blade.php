@extends('layouts.guest')

@section('content')
<div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-2xl font-bold text-center mb-6">Daftar Akun Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Lengkap --}}
        <div class="mb-4">
            <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <input type="password" name="password" placeholder="Password" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-4">
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        {{-- Role --}}
        <div class="mb-4">
            <label class="block font-medium mb-2">Tipe Pengguna</label>
            <div class="flex gap-4">
                <label class="flex items-center gap-2">
                    <input type="radio" name="role" value="user" {{ old('role') == 'user' ? 'checked' : '' }} required>
                    User
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="role" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}>
                    Admin
                </label>
            </div>
        </div>

        {{-- Telepon --}}
        <div class="mb-4">
            <input type="text" name="phone" placeholder="Nomor Telepon" maxlength="13" value="{{ old('phone') }}"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        {{-- Bio --}}
        <div class="mb-4">
            <textarea name="bio" placeholder="Bio (khusus Freelancer)" rows="3"
                      class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none">{{ old('bio') }}</textarea>
        </div>

        {{-- Foto Profil --}}
        <div class="mb-4">
            <label class="block font-medium mb-2">Foto Profil</label>
            <input type="file" name="profile_picture"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none">
        </div>

        {{-- Tombol Submit --}}
        <div class="pt-4">
            <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-black font-semibold py-3 rounded-lg shadow-md transition">
                Daftar
            </button>
        </div>
    </form>

    <p class="text-center text-sm text-gray-600 mt-4">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login di sini</a>
    </p>
</div>
@endsection
