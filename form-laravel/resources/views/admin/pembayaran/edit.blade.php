@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Pembayaran</h3>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Jumlah Pembayaran --}}
        <div class="mb-3">
          <x-input 
            label="Jumlah Pembayaran" 
            name="jumlah_pembayaran" 
            type="number" 
            required 
            min="0" 
            step="100" 
            value="{{ old('jumlah_pembayaran', $pembayaran->jumlah_pembayaran) }}"
          />
          @error('jumlah_pembayaran')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        {{-- Metode Pembayaran --}}
        <div class="mb-3">
          <x-select 
            label="Metode Pembayaran" 
            name="metode_pembayaran" 
            :options="[
              'Transfer Bank' => 'Transfer Bank',
              'E-Wallet' => 'E-Wallet',
              'Cash On Delivery' => 'Cash On Delivery'
            ]"
            :selected="old('metode_pembayaran', $pembayaran->metode_pembayaran)"
          />
          @error('metode_pembayaran')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        {{-- Setuju Syarat --}}
        <div class="form-group form-check mt-2">
          <input type="checkbox" name="setuju_syarat" class="form-check-input" id="setujuSyarat"
            {{ old('setuju_syarat', $pembayaran->setuju_syarat) ? 'checked' : '' }}>
          <label class="form-check-label" for="setujuSyarat">Saya setuju dengan syarat dan ketentuan</label>
          @error('setuju_syarat')
            <br><small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
@endsection
