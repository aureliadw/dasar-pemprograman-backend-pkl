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
      <h3 class="card-title">Edit Portofolio</h3>
    </div>

    <div class="card-body">
      <form action="{{ route('admin.portofolio.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-input
          label="Judul Portofolio"
          type="text"
          name="judul"
          id="judul"
          value="{{ old('judul', $portofolio->judul_portofolio) }}"
          required
        />

        <x-textarea label="Ringkasan Portofolio" name="ringkasan" rows="6">
          {{ old('ringkasan', $portofolio->ringkasan) }}
        </x-textarea>

        <x-select
          label="Keahlian"
          name="keahlian[]"
          multiple
          :options="[
              'Pengembangan Aplikasi Mobile' => 'Pengembangan Aplikasi Mobile',
              'Penulisan Konten' => 'Penulisan Konten',
              'Pemasaran Digital' => 'Pemasaran Digital',
              'Desain UI/UX' => 'Desain UI/UX',
              'SEO' => 'SEO'
          ]"
          :selected="old('keahlian', $portofolio->keahlian ?? [])"
        />

        <x-input
          label="Warna Tema Portofolio"
          type="color"
          name="warna_tema"
          value="{{ old('warna_tema', $portofolio->warna_tema) }}"
        />

        <div class="mb-3">
          <label for="gambar">Upload Gambar Proyek (opsional)</label>
          <input
            type="file"
            name="gambar[]"
            accept="image/*"
            multiple
            class="form-control"
          />
          <small>Max 5MB per gambar</small>
        </div>

        @if($portofolio->gambar && count($portofolio->gambar))
          <div class="mb-4">
            @foreach($portofolio->gambar as $g)
              <img src="{{ asset('storage/' . $g->file_path) }}" width="100" alt="Gambar Proyek" class="me-2 mb-2">
            @endforeach
          </div>
        @endif

        <hr>

        <h5 class="mb-3">Item Proyek Anda</h5>
        <div id="proyek-form" class="d-flex gap-2 mb-2">
          <x-input type="text" id="judulProyek" placeholder="Nama proyek" />
          <x-input type="text" id="deskripsiProyek" placeholder="Ringkasan proyek" />
          <x-input type="url" id="urlProyek" placeholder="https://www.example.com" />
          <button type="button" class="btn btn-secondary" onclick="tambahItem()">Tambah Item</button>
        </div>

        <table class="table table-bordered" id="tabelProyek">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>URL</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>

        <input type="hidden" name="data_proyek" id="dataProyek">

        <hr>

        <h5>Lokasi Utama (Peta)</h5>
        <x-input label="Longitude" name="longitude" value="{{ old('longitude', $portofolio->lpl->longitude ?? '') }}" />
        <x-input label="Latitude" name="latitude" value="{{ old('latitude', $portofolio->lpl->latitude ?? '') }}" />

        <button type="button" class="btn btn-info mb-3" onclick="tampilkanLokasi()">Cek Lokasi</button>
        <p id="lokasiOutput" class="text-muted"></p>

        <hr>

        <h5>Persetujuan</h5>
        <div class="form-check mb-2">
          <input
            type="checkbox"
            name="terbuka"
            value="1"
            class="form-check-input"
            id="terbuka"
            {{ old('terbuka', $portofolio->lpl->terbuka_klien ?? false) ? 'checked' : '' }}
          />
          <label for="terbuka" class="form-check-label">Saya terbuka untuk menerima klien baru</label>
        </div>

        <label>Layanan yang Ditawarkan</label>
        <div class="mb-2">
          @php
            $layananDipilih = old('layanan', $portofolio->lpl->layanan ?? []);
          @endphp
          <label><input type="checkbox" name="layanan[]" value="Konsultasi" {{ in_array('Konsultasi', $layananDipilih) ? 'checked' : '' }}> Konsultasi</label>
          <label><input type="checkbox" name="layanan[]" value="Maintenance" {{ in_array('Maintenance', $layananDipilih) ? 'checked' : '' }}> Maintenance</label>
          <label><input type="checkbox" name="layanan[]" value="Pelatihan" {{ in_array('Pelatihan', $layananDipilih) ? 'checked' : '' }}> Pelatihan</label>
        </div>

        <div class="form-check mt-3">
          <input
            type="checkbox"
            name="setuju"
            value="1"
            required
            class="form-check-input"
            id="setuju"
            {{ old('setuju', $portofolio->lpl->setuju ?? false) ? 'checked' : '' }}
          />
          <label for="setuju" class="form-check-label">
            Saya menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>.
          </label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Portofolio</button>
      </form>
    </div>
  </div>

  <script>
    let proyekList = @json($portofolio->item->map(fn($i) => [
      'judul' => $i->judul_proyek,
      'deskripsi' => $i->deskripsi_singkat,
      'url' => $i->url_proyek
    ]));

    function tambahItem() {
      const judul = document.getElementById('judulProyek').value;
      const deskripsi = document.getElementById('deskripsiProyek').value;
      const url = document.getElementById('urlProyek').value;

      if (judul && deskripsi) {
        proyekList.push({ judul, deskripsi, url });
        updateTabel();
        document.getElementById('judulProyek').value = '';
        document.getElementById('deskripsiProyek').value = '';
        document.getElementById('urlProyek').value = '';
      }
    }

    function updateTabel() {
      const tbody = document.querySelector('#tabelProyek tbody');
      tbody.innerHTML = '';
      proyekList.forEach((item, index) => {
        const row = `
          <tr>
            <td>${item.judul}</td>
            <td>${item.deskripsi}</td>
            <td><a href="${item.url}" target="_blank">${item.url}</a></td>
            <td><a href="#" onclick="hapusItem(${index})">Hapus</a></td>
          </tr>`;
        tbody.innerHTML += row;
      });
      document.getElementById('dataProyek').value = JSON.stringify(proyekList);
    }

    function hapusItem(index) {
      proyekList.splice(index, 1);
      updateTabel();
    }

    function tampilkanLokasi() {
      const lat = document.getElementById('latitude').value;
      const long = document.getElementById('longitude').value;
      document.getElementById('lokasiOutput').innerText = `Lokasi: ${lat}, ${long}`;
    }

    updateTabel();
  </script>
@endsection
