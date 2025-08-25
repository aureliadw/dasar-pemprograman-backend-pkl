@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-header">
      <h5 class="card-title mb-3">Daftar Ulasan</h5>

      <div class="row g-3 align-items-center">
        {{-- Search --}}
        <div class="col-md-6 col-sm-12">
          <form method="GET" action="{{ route('admin.ulasan.index') }}" class="d-flex">
            <input type="text" name="search" value="{{ request('search') }}" 
                   class="form-control form-control-sm me-2" placeholder="Cari komentar...">
            <button type="submit" class="btn btn-primary btn-sm">Cari</button>
          </form>
        </div>

        {{-- Sort --}}
        <div class="col-md-3 col-sm-6">
          <form method="GET" action="{{ route('admin.ulasan.index') }}">
            <select name="sort" class="form-select form-select-sm select2" onchange="this.form.submit()">
              <option value="desc" {{ request('sort', 'desc') == 'desc' ? 'selected' : '' }}>Terbaru</option>
              <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terlama</option>
            </select>
          </form>
        </div>

        {{-- Tambah --}}
        <div class="col-md-3 col-sm-6 text-md-end text-sm-start">
          <a href="{{ route('admin.ulasan.create') }}" class="btn btn-success btn-sm">+ Tambah Ulasan</a>
        </div>
      </div>
    </div>

    <div class="card-body">
      @if($ulasan->isEmpty())
        <div class="text-center text-muted">Belum ada ulasan yang diberikan.</div>
      @else
        <div class="table-responsive">
          <table class="table table-sm table-bordered table-hover align-middle">
            <thead class="table-dark">
              <tr class="text-center">
                <th style="width: 50px;">#</th>
                <th style="width: 80px;">Rating</th>
                <th>Komentar</th>
                <th style="width: 130px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ulasan as $item)
                <tr>
                  <td class="text-center">{{ ($ulasan->currentPage() - 1) * $ulasan->perPage() + $loop->iteration }}</td>
                  <td class="text-center">{{ $item->rating }} ★</td>
                  <td>{{ \Str::limit($item->komentar, 60) }}</td>
                  <td class="text-center">
                    <a href="{{ route('admin.ulasan.edit', $item->id) }}" class="btn btn-warning btn-sm me-1 mb-1">Edit</a>
                    <form action="{{ route('admin.ulasan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm mb-1">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
          {{ $ulasan->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
      @endif
    </div>
  </div>
@endsection

@push('styles')
  {{-- Select2 CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
  {{-- Select2 JS --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.select2').select2({
        width: '100%',
        minimumResultsForSearch: Infinity // biar ga ada box search
      });
    });
  </script>
@endpush
