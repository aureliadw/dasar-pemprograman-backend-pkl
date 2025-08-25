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
        @error('detail_proyek')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-textarea 
          label="Deskripsi" 
          name="deskripsi" 
          :value="old('deskripsi')" 
          rows="4" 
          required 
        />
        @error('deskripsi')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-select 
          label="Kategori" 
          name="kategori" 
          class="select2"
          :selected="old('kategori')" 
          :options="[
            'Pengembangan Web' => 'Pengembangan Web',
            'Pengembangan Mobile' => 'Pengembangan Mobile',
            'Desain Grafis' => 'Desain Grafis'
          ]" 
          required 
        />
        @error('kategori')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-input 
          type="number" 
          label="Anggaran (Rp)" 
          name="anggaran" 
          :value="old('anggaran')" 
          required 
        />
        @error('anggaran')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <x-input 
          type="datetime-local" 
          label="Batas Penawaran" 
          name="batas_penawaran" 
          :value="old('batas_penawaran')" 
          required 
        />
        @error('batas_penawaran')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

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
        @error('lokasi_pengerjaan')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        {{-- Upload File dengan FilePond - HAPUS class="form-control" --}}
        <div class="mb-3">
          <label for="lampiran" class="form-label">Lampiran (Opsional)</label>
          <input type="file" name="lampiran" id="lampiran">
        </div>
        @error('lampiran')
          <div class="text-danger small">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
@endsection

{{-- Tambahkan FilePond --}}
@push('styles')
  <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
  <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

@push('scripts')
  <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
  <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

  <script>
    // Daftarkan plugin preview
    FilePond.registerPlugin(FilePondPluginImagePreview);

    // Buat FilePond instance
    const pond = FilePond.create(document.querySelector('#lampiran'), {
      labelIdle: 'Drag & Drop atau <span class="filepond--label-action">Pilih File</span>',
      allowImagePreview: true,
      allowMultiple: false,
      instantUpload: false,
      storeAsFile: true, // Penting! Ini yang bikin file ke-submit
      acceptedFileTypes: ['image/*'],
      maxFileSize: '2MB',
      // Tambahan config untuk memastikan compatibility
      credits: false,
      allowRevert: false,
      allowProcess: false
    });

    // Optional: Debug untuk memastikan file ada saat submit
    document.querySelector('form').addEventListener('submit', function(e) {
      const files = pond.getFiles();
      console.log('FilePond files:', files); // Debug di browser console
    });
  </script>
@endpush