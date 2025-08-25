@extends('layouts.app')

@section('content')
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
  <div class="card-header">
    <h3 class="card-title mb-3">Daftar Proyek</h3>

    <div class="row g-3 align-items-center">
      {{-- Search --}}
      <div class="col-md-6 col-sm-12">
        <form action="{{ route('admin.posting-proyek.index') }}" method="GET" class="d-flex">
          <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm me-2" placeholder="Cari detail/deskripsi proyek...">
          <button type="submit" class="btn btn-primary btn-sm">Cari</button>
        </form>
      </div>

      {{-- Sort pakai Select2 --}}
      <div class="col-md-3 col-sm-6">
        <form action="{{ route('admin.posting-proyek.index') }}" method="GET">
          <select name="sort" onchange="this.form.submit()" class="form-select form-select-sm select2">
            <option value="desc" {{ request('sort', 'desc') == 'desc' ? 'selected' : '' }}>Urutkan: Terbaru</option>
            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Urutkan: Terlama</option>
          </select>
        </form>
      </div>

      {{-- Tambah --}}
      <div class="col-md-3 col-sm-6 text-end">
        <a href="{{ route('admin.posting-proyek.create') }}" class="btn btn-success btn-sm">+ Posting Proyek</a>
      </div>
    </div>
  </div>

  <div class="card-body">
    @if($data->isEmpty())
      <div class="text-center text-muted">Belum ada proyek yang diposting.</div>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Detail Proyek</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th>Anggaran</th>
              <th>Batas Penawaran</th>
              <th>Lokasi</th>
              <th>Lampiran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $proyek)
              <tr>
                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                <td>{{ \Str::limit($proyek->detail_proyek, 50) }}</td>
                <td>{{ \Str::limit($proyek->deskripsi, 50) }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $proyek->kategori)) }}</td>
                <td>Rp {{ number_format($proyek->anggaran, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($proyek->batas_penawaran)->format('d M Y H:i') }}</td>
                <td>{{ ucfirst($proyek->lokasi_pengerjaan) }}</td>
                <td>
                  @if($proyek->lampiran)
                    {{-- Kalau lampiran gambar, tampilkan thumbnail --}}
                    @if(Str::endsWith(strtolower($proyek->lampiran), ['.jpg','.jpeg','.png','.gif']))
                      <a href="{{ asset('storage/lampiran/' . $proyek->lampiran) }}" target="_blank">
                        <img src="{{ asset('storage/lampiran/' . $proyek->lampiran) }}" alt="Lampiran" style="max-width: 80px; max-height: 80px; border-radius: 4px;">
                      </a>
                    @else
                      {{-- Kalau bukan gambar, kasih link download --}}
                      <a href="{{ asset('storage/lampiran/' . $proyek->lampiran) }}" target="_blank">Lihat File</a>
                    @endif
                  @else
                    <span class="text-muted">-</span>
                  @endif
                </td>
                <td>
                  <div class="d-flex flex-column gap-1">
                    <a href="{{ route('admin.posting-proyek.edit', $proyek->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                    <form action="{{ route('admin.posting-proyek.destroy', $proyek->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm mb-1">Hapus</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Pagination --}}
      <div class="mt-3">
        {{ $data->withQueryString()->links('pagination::bootstrap-5') }}
      </div>
    @endif
  </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('.select2').select2({
      minimumResultsForSearch: Infinity, // hide search box
      width: '100%' // biar full width
    });
  });
</script>
@endpush
