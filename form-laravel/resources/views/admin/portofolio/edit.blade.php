@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/proyek.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endpush

@section('content')
<div class="container py-4">
    <div class="card shadow-lg rounded-2xl p-4">
        <h2 class="text-xl font-bold mb-4">Edit Portofolio</h2>

        @if ($errors->any())
            <div class="alert alert-danger rounded-lg p-3 mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success rounded-lg p-3 mb-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-input label="Judul Portofolio" name="judul" type="text" 
                :value="old('judul', $portofolio->judul_portofolio)" required />
            @error('judul')<small class="text-red-500">{{ $message }}</small>@enderror

            <div class="mt-3">
                <x-textarea label="Ringkasan Portofolio" name="ringkasan" rows="5">
                    {{ old('ringkasan', $portofolio->ringkasan) }}
                </x-textarea>
                @error('ringkasan')<small class="text-red-500">{{ $message }}</small>@enderror
            </div>

            <div class="mt-3">
                <label class="block mb-1 font-medium">Keahlian</label>
                <select name="keahlian[]" class="select2 w-full border rounded p-2" multiple>
                    @foreach(['Pengembangan Aplikasi Mobile','Penulisan Konten','Pemasaran Digital','Desain UI/UX','SEO'] as $skill)
                        <option value="{{ $skill }}" 
                            {{ in_array($skill, old('keahlian', is_array($portofolio->keahlian) ? $portofolio->keahlian : explode(',', $portofolio->keahlian ?? ''))) ? 'selected' : '' }}>
                            {{ $skill }}
                        </option>
                    @endforeach
                </select>
                @error('keahlian')<small class="text-red-500">{{ $message }}</small>@enderror
            </div>

            <div class="mt-3">
                <x-input label="Warna Tema" name="warna_tema" type="color" 
                    :value="old('warna_tema', $portofolio->warna_tema ?? '#6A0DAD')" />
            </div>

            <div class="mt-3">
                <label for="gambar" class="font-medium">Upload Gambar</label>
                <input type="file" name="gambar[]" id="gambar" multiple>
                <small class="text-gray-500">Maksimal 5 file, masing-masing 5MB</small>
                @error('gambar')<small class="text-red-500">{{ $message }}</small>@enderror
            </div>

            <div class="mt-4">
                <h5 class="font-semibold mb-2">Item Proyek</h5>
                <div class="flex flex-col md:flex-row gap-2 mb-3">
                    <x-input placeholder="Judul Proyek" id="judulProyek" />
                    <x-input placeholder="Deskripsi Proyek" id="deskripsiProyek" />
                    <x-input placeholder="URL Proyek" type="url" id="urlProyek" />
                    <button type="button" class="btn btn-secondary" onclick="tambahItem()">Tambah</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-sm w-full" id="tabelProyek">
                        <thead class="bg-gray-100">
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>URL</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <input type="hidden" name="data_proyek" id="dataProyek">
            </div>

            <div class="mt-4">
                <h5 class="font-semibold mb-2">Lokasi Utama (Peta)</h5>
                <x-input label="Longitude" name="longitude" :value="old('longitude', $portofolio->lpl->longitude ?? '106.8456000')" />
                <x-input label="Latitude" name="latitude" :value="old('latitude', $portofolio->lpl->latitude ?? '-6.2088000')" />
                <button type="button" class="btn btn-info mt-2" onclick="tampilkanLokasi()">Cek Lokasi</button>
                <p id="lokasiOutput" class="text-sm text-gray-600 mt-2"></p>
            </div>

            <div class="mt-4">
                <h5 class="font-semibold mb-2">Persetujuan</h5>
                <label class="flex items-center mb-2">
                    <input type="checkbox" name="terbuka" value="1" 
                        {{ old('terbuka', $portofolio->lpl->terbuka_klien ?? false) ? 'checked' : '' }}>
                    Saya terbuka menerima klien baru
                </label>

                @php
                    $layananArray = json_decode($portofolio->lpl->layanan ?? '[]', true);
                @endphp
                <label class="block mb-1 font-medium">Layanan yang Ditawarkan</label>
                <select name="layanan[]" class="select2 w-full border rounded p-2" multiple>
                    @foreach(['Konsultasi','Maintenance','Pelatihan'] as $layanan)
                        <option value="{{ $layanan }}" 
                            {{ in_array($layanan, old('layanan', $layananArray)) ? 'selected' : '' }}>
                            {{ $layanan }}
                        </option>
                    @endforeach
                </select>
                @error('layanan')<small class="text-red-500">{{ $message }}</small>@enderror

                <label class="block mt-4">
                    <input type="checkbox" name="setuju" 
                        {{ old('setuju', $portofolio->lpl->setuju ?? false) ? 'checked' : '' }} required>
                    Saya menyetujui <a href="#" class="text-blue-600">Syarat & Ketentuan</a> dan 
                    <a href="#" class="text-blue-600">Kebijakan Privasi</a>.
                </label>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Update Portofolio</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<script>
$(function() {
    $('.select2').select2({ placeholder: "Pilih opsi", allowClear: true, width: '100%' });

    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImagePreview);

    FilePond.create(document.querySelector('#gambar'), {
        acceptedFileTypes: ['image/*'],
        allowMultiple: true,
        maxFiles: 5,
        storeAsFile: true,
        labelIdle: 'Drag & Drop gambar atau <span class="filepond--label-action">Pilih</span>',
        files: [
            @foreach($portofolio->gambar as $img)
                {
                    source: "{{ asset($img->file_path) }}",
                    options: { type: 'local' }
                },
            @endforeach
        ]

    });
});

// Preload items proyek
let proyekList = @json($portofolio->items->map(fn($item) => [
    'judul' => $item->judul_proyek,
    'deskripsi' => $item->deskripsi_singkat,
    'url' => $item->url_proyek
]));

function tambahItem() {
    const judul = $('#judulProyek').val().trim();
    const deskripsi = $('#deskripsiProyek').val().trim();
    const url = $('#urlProyek').val().trim();

    if(judul && deskripsi){
        proyekList.push({judul, deskripsi, url});
        updateTabel();
        $('#judulProyek, #deskripsiProyek, #urlProyek').val('');
    } else {
        alert('Judul dan deskripsi proyek wajib diisi.');
    }
}

function updateTabel() {
    const tbody = $('#tabelProyek tbody');
    tbody.empty();
    if(proyekList.length === 0){
        tbody.append('<tr><td colspan="4" class="text-center text-gray-500 italic">Belum ada item proyek</td></tr>');
    } else {
        proyekList.forEach((item, i) => {
            tbody.append(`
                <tr>
                    <td>${item.judul}</td>
                    <td>${item.deskripsi}</td>
                    <td>${item.url ? `<a href="${item.url}" target="_blank">${item.url}</a>` : ''}</td>
                    <td><a href="#" onclick="hapusItem(${i}); return false;" class="text-red-500">Hapus</a></td>
                </tr>
            `);
        });
    }
    $('#dataProyek').val(JSON.stringify(proyekList));
}

function hapusItem(i){
    proyekList.splice(i, 1);
    updateTabel();
}

function tampilkanLokasi(){
    $('#lokasiOutput').text(`Lokasi: ${$('#latitude').val()}, ${$('#longitude').val()}`);
}

updateTabel();
</script>
@endpush
