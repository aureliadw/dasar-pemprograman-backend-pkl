@extends('layouts.app')

@section('content')
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="card">
  <div class="card-header">
    <h3 class="card-title mb-3">Manajemen Tugas Proyek</h3>

    <div class="row g-2 align-items-center">
      {{-- Search --}}
      <div class="col-md-6 col-sm-12">
        <form action="{{ route('admin.manajemen-tugas.index') }}" method="GET" class="d-flex">
          <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm me-2" placeholder="Cari judul/deskripsi...">
          <button type="submit" class="btn btn-primary btn-sm">Cari</button>
        </form>
      </div>

      {{-- Sort --}}
      <div class="col-md-3 col-sm-6">
        <form method="GET" action="{{ route('admin.manajemen-tugas.index') }}">
          <select name="sort" class="form-select form-select-sm select2" onchange="this.form.submit()">
            <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Terbaru</option>
            <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Terlama</option>
          </select>
        </form>
      </div>

      {{-- Tambah --}}
      <div class="col-md-3 col-sm-6 text-end">
        <button type="button" class="btn btn-success btn-sm" onclick="tambahBaris()">+ Tambah Tugas</button>
      </div>
    </div>
  </div>

  <form action="{{ route('admin.manajemen-tugas.store') }}" method="POST" id="formTugas">
    @csrf
    <div class="card-body">
      @if($tugas->isEmpty())
        <div class="text-center text-muted">Belum ada tugas proyek.</div>
      @else
        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle" id="tugasTable">
            <thead class="thead-dark text-center">
              <tr>
                <th style="width: 60px;">No</th>
                <th>Judul Tugas</th>
                <th>Deskripsi</th>
                <th>Batas Akhir</th>
                <th>Status</th>
                <th>Progres</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tugas as $i => $t)
              <tr>
                <td class="text-center">{{ ($tugas->currentPage() - 1) * $tugas->perPage() + $loop->iteration }}</td>
                <td>
                  <input type="text" name="tugas[{{ $i }}][judul]" value="{{ old("tugas.$i.judul", $t->judul) }}" class="form-control @error("tugas.$i.judul") is-invalid @enderror" required>
                  @error("tugas.$i.judul")
                    <div class="text-danger small mt-1">{{ $message }}</div>
                  @enderror
                </td>
                <td>
                  <input type="text" name="tugas[{{ $i }}][deskripsi]" value="{{ old("tugas.$i.deskripsi", $t->deskripsi) }}" class="form-control @error("tugas.$i.deskripsi") is-invalid @enderror" required>
                  @error("tugas.$i.deskripsi")
                    <div class="text-danger small mt-1">{{ $message }}</div>
                  @enderror
                </td>
                <td>
                  <input type="date" name="tugas[{{ $i }}][batas]" value="{{ old("tugas.$i.batas", $t->batas) }}" class="form-control @error("tugas.$i.batas") is-invalid @enderror" required>
                  @error("tugas.$i.batas")
                    <div class="text-danger small mt-1">{{ $message }}</div>
                  @enderror
                </td>
                <td>
                  <select name="tugas[{{ $i }}][status]" class="form-control select2 @error("tugas.$i.status") is-invalid @enderror">
                    <option value="belum_mengisi" {{ old("tugas.$i.status", $t->status) == 'belum_mengisi' ? 'selected' : '' }}>Belum Mengisi</option>
                    <option value="dalam_proses" {{ old("tugas.$i.status", $t->status) == 'dalam_proses' ? 'selected' : '' }}>Dalam Proses</option>
                    <option value="selesai" {{ old("tugas.$i.status", $t->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                  </select>
                  @error("tugas.$i.status")
                    <div class="text-danger small mt-1">{{ $message }}</div>
                  @enderror
                </td>
                <td class="text-center" style="min-width: 150px;">
                  <input type="range" min="0" max="100" value="{{ old("tugas.$i.progres", $t->progres) }}" class="form-range" oninput="this.nextElementSibling.value = this.value">
                  <input type="number" name="tugas[{{ $i }}][progres]" value="{{ old("tugas.$i.progres", $t->progres) }}" class="form-control mt-1 @error("tugas.$i.progres") is-invalid @enderror" min="0" max="100" />
                  @error("tugas.$i.progres")
                    <div class="text-danger small mt-1">{{ $message }}</div>
                  @enderror
                </td>
                <td class="text-center">
                  <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">Hapus</button>
                </td>
                <input type="hidden" name="tugas[{{ $i }}][id]" value="{{ $t->id }}" />
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center">
      <button type="submit" class="btn btn-primary">Simpan Semua Perubahan</button>
      <div>
        {{ $tugas->withQueryString()->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </form>
</div>

{{-- Load jQuery & Select2 --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
let index = {{ max(count($tugas), 1) }};

// Tambah baris baru
function tambahBaris() {
    const table = document.querySelector('#tugasTable tbody');
    const row = document.createElement('tr');
    row.innerHTML = `
      <td class="text-center">-</td>
      <td>
        <input type="text" name="tugas[${index}][judul]" class="form-control" required>
      </td>
      <td>
        <input type="text" name="tugas[${index}][deskripsi]" class="form-control" required>
      </td>
      <td>
        <input type="date" name="tugas[${index}][batas]" class="form-control" required>
      </td>
      <td>
        <select name="tugas[${index}][status]" class="form-control select2">
          <option value="belum_mengisi">Belum Mengisi</option>
          <option value="dalam_proses">Dalam Proses</option>
          <option value="selesai">Selesai</option>
        </select>
      </td>
      <td class="text-center">
        <input type="range" min="0" max="100" value="0" class="form-range" oninput="this.nextElementSibling.value = this.value">
        <input type="number" name="tugas[${index}][progres]" value="0" class="form-control mt-1" min="0" max="100" />
      </td>
      <td class="text-center">
        <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">Hapus</button>
      </td>
    `;
    table.appendChild(row);

    // Re-init Select2 di baris baru
    $(row).find('.select2').select2({ width: '100%' });
    index++;
}

// Init select2 awal
$(document).ready(function() {
    $('.select2').select2({
        width: '100%',
        placeholder: 'Pilih opsi'
    });
});
</script>
@endsection
