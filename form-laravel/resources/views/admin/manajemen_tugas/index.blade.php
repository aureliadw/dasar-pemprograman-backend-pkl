@extends('layouts.app')

@section('content')
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="card-title mb-0">Manajemen Tugas Proyek</h3>
    <button type="button" class="btn btn-success btn-sm" onclick="tambahBaris()">+ Tambah Tugas</button>
  </div>

  <form action="{{ route('admin.manajemen-tugas.store') }}" method="POST" id="formTugas">
    @csrf

    <div class="card-body">
      @if($tugas->isEmpty())
        <div class="text-center text-muted">Belum ada tugas yang dimasukkan.</div>
      @else
        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle" id="tugasTable">
            <thead class="thead-dark text-center">
              <tr>
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
                <td><input type="text" name="tugas[{{ $i }}][judul]" value="{{ $t->judul }}" class="form-control" required></td>
                <td><input type="text" name="tugas[{{ $i }}][deskripsi]" value="{{ $t->deskripsi }}" class="form-control" required></td>
                <td><input type="date" name="tugas[{{ $i }}][batas]" value="{{ $t->batas }}" class="form-control" required></td>
                <td>
                  <select name="tugas[{{ $i }}][status]" class="form-control">
                    <option value="belum_mengisi" {{ $t->status == 'belum_mengisi' ? 'selected' : '' }}>Belum Mengisi</option>
                    <option value="dalam_proses" {{ $t->status == 'dalam_proses' ? 'selected' : '' }}>Dalam Proses</option>
                    <option value="selesai" {{ $t->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                  </select>
                </td>
                <td class="text-center" style="min-width: 150px;">
                  <input type="range" min="0" max="100" value="{{ $t->progres }}" class="form-range" 
                         oninput="this.nextElementSibling.value = this.value">
                  <input type="number" name="tugas[{{ $i }}][progres]" value="{{ $t->progres }}" class="form-control mt-1" min="0" max="100" />
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

    <div class="card-footer text-end">
      <button type="submit" class="btn btn-primary">Simpan Semua Perubahan</button>
    </div>
  </form>
</div>

<script>
  let index = {{ count($tugas) }};

  function tambahBaris() {
    const table = document.querySelector('#tugasTable tbody');
    const row = document.createElement('tr');

    row.innerHTML = `
      <td><input type="text" name="tugas[${index}][judul]" class="form-control" required></td>
      <td><input type="text" name="tugas[${index}][deskripsi]" class="form-control" required></td>
      <td><input type="date" name="tugas[${index}][batas]" class="form-control" required></td>
      <td>
        <select name="tugas[${index}][status]" class="form-control">
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
    index++;
  }
</script>
@endsection
