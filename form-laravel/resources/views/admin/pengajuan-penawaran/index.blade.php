@extends('layouts.app')

@section('content')
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
  <div class="card-header">
    <h3 class="card-title mb-3">Daftar Pengajuan Penawaran</h3>

    <div class="row align-items-center">
      {{-- Search --}}
      <div class="col-md-6 col-sm-12 mb-2">
        <form action="{{ route('admin.pengajuan.index') }}" method="GET" class="d-flex">
          <input type="text" name="search" value="{{ request('search') }}" 
                 class="form-control form-control-sm me-2" 
                 placeholder="Cari jumlah/pesan...">
          <button type="submit" class="btn btn-primary btn-sm">Cari</button>
        </form>
      </div>

      {{-- Sort pakai Select2 --}}
      <div class="col-md-3 col-sm-6 mb-2">
        <form action="{{ route('admin.pengajuan.index') }}" method="GET">
          <select id="sortDropdown" name="sort" onchange="this.form.submit()" 
                  class="form-select form-select-sm">
            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Urutkan: Terbaru</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Urutkan: Terlama</option>
          </select>
        </form>
      </div>

      {{-- Tombol tambah --}}
      <div class="col-md-3 col-sm-6 text-md-end text-sm-start mb-2">
        <a href="{{ route('admin.pengajuan.create') }}" class="btn btn-success btn-sm ms-md-2">
          + Tambah Penawaran
        </a>
      </div>
    </div>
  </div>

  <div class="card-body">
    @if($pengajuans->isEmpty())
      <div class="text-center text-muted">Belum ada data penawaran.</div>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Jumlah Penawaran</th>
              <th>Pesan</th>
              <th>Durasi Pengerjaan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pengajuans as $index => $item)
              <tr>
                <td>{{ ($pengajuans->currentPage() - 1) * $pengajuans->perPage() + $loop->iteration }}</td>
                <td>Rp {{ number_format($item->jumlah_penawaran, 0, ',', '.') }}</td>
                <td>{{ $item->pesan }}</td>
                <td><span class="badge bg-info">{{ $item->durasi_pengerjaan }} hari</span></td>
                <td>
                  <a href="{{ route('admin.pengajuan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form action="{{ route('admin.pengajuan.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Pagination --}}
      <div class="mt-3">
        {{ $pengajuans->withQueryString()->links('pagination::bootstrap-5') }}
      </div>
    @endif
  </div>
</div>

{{-- Tambah Select2 --}}
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#sortDropdown').select2({
      minimumResultsForSearch: Infinity, // hide search box
      width: '100%' // biar full width
    });
  });
</script>
@endpush
@endsection
