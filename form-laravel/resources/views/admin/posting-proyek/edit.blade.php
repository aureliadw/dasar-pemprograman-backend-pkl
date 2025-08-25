@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">Edit Proyek</h3>
      <a href="{{ route('admin.posting-proyek.index') }}" class="btn btn-secondary btn-sm">&larr; Kembali</a>
    </div>

    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.posting-proyek.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-input label="Detail Proyek" name="detail_proyek" :value="old('detail_proyek', $data->detail_proyek)" required />
        @error('detail_proyek')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-textarea label="Deskripsi" name="deskripsi" :value="old('deskripsi', $data->deskripsi)" rows="4" required />
        @error('deskripsi')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-select label="Kategori" name="kategori" :selected="old('kategori', $data->kategori)" :options="[
          'Pengembangan Web' => 'Pengembangan Web',
          'Pengembangan Mobile' => 'Pengembangan Mobile',
          'Desain Grafis' => 'Desain Grafis'
        ]" required />
        @error('kategori')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-input type="number" label="Anggaran (Rp)" name="anggaran" :value="old('anggaran', $data->anggaran)" required />
        @error('anggaran')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-input type="datetime-local" label="Batas Penawaran" name="batas_penawaran" :value="old('batas_penawaran', \Carbon\Carbon::parse($data->batas_penawaran)->format('Y-m-d\TH:i'))" required />
        @error('batas_penawaran')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-radio-group label="Lokasi Pengerjaan" name="lokasi_pengerjaan" :checked="old('lokasi_pengerjaan', $data->lokasi_pengerjaan)" :options="[
          'remote' => 'Remote',
          'onsite' => 'Onsite'
        ]" required />
        @error('lokasi_pengerjaan')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-input type="file" label="Lampiran (Opsional)" name="lampiran" />
        @error('lampiran')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        @if($data->lampiran)
          <p class="mt-2">Lampiran saat ini: 
            <a href="{{ asset('storage/lampiran/' . $data->lampiran) }}" target="_blank">Lihat</a>
          </p>
        @endif

        <button type="submit" class="btn btn-primary">Perbarui</button>
      </form>
    </div>
  </div>
@endsection
