@extends('layouts.app') 

@section('content')
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
  <div class="card-header">
  <h3 class="card-title mb-3">Daftar Pembayaran</h3>

  <div class="row align-items-center">
    {{-- Search --}}
    <div class="col-md-6 col-sm-12 mb-2">
      <form action="{{ route('admin.pembayaran.index') }}" method="GET" class="d-flex">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm me-2" placeholder="Cari jumlah/metode...">
        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
      </form>
    </div>

    {{-- Sort (pakai Select2) --}}
    <div class="col-md-3 col-sm-6 mb-2">
      <form action="{{ route('admin.pembayaran.index') }}" method="GET" class="d-flex">
        <select id="sortDropdown" name="sort" onchange="this.form.submit()" class="form-select form-select-sm">
          <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Urutkan: Terbaru</option>
          <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Urutkan: Terlama</option>
        </select>
      </form>
    </div>

    {{-- Tambah --}}
    <div class="col-md-3 col-sm-6 text-end mb-2">
      <a href="{{ route('admin.pembayaran.create') }}" class="btn btn-success btn-sm ms-2">+ Tambah Pembayaran</a>
    </div>
  </div>
</div>

  <div class="card-body">
    @if($pembayarans->isEmpty())
      <div class="text-center text-muted">Belum ada data pembayaran.</div>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Jumlah</th>
              <th>Metode</th>
              <th>Setuju Syarat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pembayarans as $item)
              <tr>
                <td>{{ ($pembayarans->currentPage() - 1) * $pembayarans->perPage() + $loop->iteration }}</td>
                <td>Rp {{ number_format($item->jumlah_pembayaran, 0, ',', '.') }}</td>
                <td>{{ ucfirst($item->metode_pembayaran) }}</td>
                <td>
                  @if($item->setuju_syarat)
                    <span class="badge bg-success">Ya</span>
                  @else
                    <span class="badge bg-danger">Tidak</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('admin.pembayaran.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                  <form action="{{ route('admin.pembayaran.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger mb-1">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Pagination --}}
      <div class="mt-3">
        {{ $pembayarans->withQueryString()->links('pagination::bootstrap-5') }}
      </div>
    @endif
  </div>
</div>
@endsection

@push('styles')
  {{-- CSS Select2 --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
  {{-- JS Select2 --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('#sortDropdown').select2({
      minimumResultsForSearch: Infinity, // sembunyiin kolom search
      width: '200px' // bisa atur lebar
    });
  });
</script>
@endpush
