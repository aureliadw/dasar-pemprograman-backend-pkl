@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Pengajuan Penawaran</h3>
      <p class="mb-0">Untuk Proyek: <strong>Desain Logo Perusahaan Baru</strong></p>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.pengajuan-penawaran.store') }}" method="POST">
        @csrf

        {{-- Jumlah Penawaran --}}
        <div class="mb-3">
          <x-input 
            label="Jumlah Penawaran Anda (IDR)" 
            name="jumlah_penawaran" 
            type="number" 
            required 
            min="0" 
            step="1" 
            value="{{ old('jumlah_penawaran') }}"
          />
          @error('jumlah_penawaran')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        {{-- Pesan/Proposal --}}
        <div class="mb-3">
          <x-textarea 
            label="Pesan/Proposal Anda" 
            name="pesan" 
            rows="4"
          >{{ old('pesan') }}</x-textarea>
          @error('pesan')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        {{-- Durasi Pengerjaan --}}
        <div class="mb-3">
          <x-input 
            label="Perkiraan Durasi Pengerjaan (Hari)" 
            name="durasi_pengerjaan" 
            type="number" 
            required 
            min="1" 
            step="1" 
            value="{{ old('durasi_pengerjaan') }}"
          />
          @error('durasi_pengerjaan')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3 w-100">Ajukan Penawaran</button>
      </form>
    </div>
  </div>
@endsection
