@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Form Pembayaran</h3>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.pembayaran.store') }}" method="POST">
        @csrf

        {{-- Jumlah Pembayaran --}}
        <div class="mb-3">
          <x-input 
            label="Jumlah Pembayaran" 
            name="jumlah_pembayaran" 
            type="number" 
            required 
            min="0" 
            step="100" 
            value="{{ old('jumlah_pembayaran') }}"
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
            :selected="old('metode_pembayaran')"
          />
          @error('metode_pembayaran')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        {{-- Setuju Syarat --}}
        <div class="form-group form-check mt-2">
          <input type="checkbox" name="setuju_syarat" class="form-check-input" id="setujuSyarat" {{ old('setuju_syarat') ? 'checked' : '' }}>
          <label class="form-check-label" for="setujuSyarat">Saya setuju dengan syarat dan ketentuan</label>
          @error('setuju_syarat')
            <br><small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Kirim Pembayaran</button>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: "Pilih opsi...",
      allowClear: true,
      width: '100%'
    });
  });
</script>
@endpush
