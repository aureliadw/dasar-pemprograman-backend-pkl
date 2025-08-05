@extends('layouts.app')

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

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

        <x-input 
          label="Jumlah Pembayaran" 
          name="jumlah_pembayaran" 
          type="number" 
          required 
          min="0" 
          step="100" 
          value="{{ old('jumlah_pembayaran', $pembayaran->jumlah_pembayaran) }}"
        />

        <x-select 
          label="Metode Pembayaran" 
          name="metode_pembayaran" 
          :options="[
            'transfer' => 'Transfer Bank',
            'ewallet' => 'E-Wallet',
            'cod' => 'Cash on Delivery'
          ]"
          :selected="old('metode_pembayaran', $pembayaran->metode_pembayaran)"
        />

        <div class="form-group form-check mt-2">
          <input type="checkbox" name="setuju_syarat" class="form-check-input" id="setujuSyarat"
            {{ old('setuju_syarat', $pembayaran->setuju_syarat) ? 'checked' : '' }}>
          <label class="form-check-label" for="setujuSyarat">Saya setuju dengan syarat dan ketentuan</label>
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
@endsection
