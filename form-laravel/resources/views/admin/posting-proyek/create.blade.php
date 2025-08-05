@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">Posting Proyek Baru</h3>
      <a href="{{ route('admin.posting-proyek.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
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

      <form action="{{ route('admin.posting-proyek.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-input 
          label="Detail Proyek" 
          name="detail_proyek" 
          :value="old('detail_proyek')" 
          required 
        />

        <x-textarea 
          label="Deskripsi" 
          name="deskripsi" 
          :value="old('deskripsi')" 
          rows="4" 
          required 
        />

        <x-select 
          label="Kategori" 
          name="kategori" 
          :selected="old('kategori')" 
          :options="[
            'penulisan_konten' => 'Penulisan Konten',
            'desain_grafis' => 'Desain Grafis'
          ]" 
          required 
        />

        <x-input 
          type="number" 
          label="Anggaran (Rp)" 
          name="anggaran" 
          :value="old('anggaran')" 
          required 
        />

        <x-input 
          type="datetime-local" 
          label="Batas Penawaran" 
          name="batas_penawaran" 
          :value="old('batas_penawaran')" 
          required 
        />

        <x-radio-group 
          label="Lokasi Pengerjaan" 
          name="lokasi_pengerjaan" 
          :checked="old('lokasi_pengerjaan')" 
          :options="[
            'remote' => 'Remote',
            'onsite' => 'Onsite'
          ]" 
          required 
        />

        <x-input 
          type="file" 
          label="Lampiran (Opsional)" 
          name="lampiran" 
        />

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
@endsection
