@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">Daftar Portofolio</h3>
      <a href="{{ route('admin.portofolio.create') }}" class="btn btn-success btn-sm">+ Tambah Portofolio</a>
    </div>

    <div class="card-body">
      @if($portofolio_satu->isEmpty())
        <div class="text-center text-muted">Belum ada data portofolio.</div>
      @else
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Ringkasan</th>
                <th>Keahlian</th>
                <th>Warna Tema</th>
                <th>Koordinat</th>
                <th>Layanan</th>
                <th>Status Terbuka</th>
                <th>Setuju</th>
                <th>Gambar</th>
                <th>Item Proyek</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($portofolio_satu as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->judul_portofolio }}</td>
                  <td>{{ Str::limit(strip_tags($item->ringkasan), 50) }}</td>
                  <td>
                    @if(is_array($item->keahlian))
                      {{ implode(', ', $item->keahlian) }}
                    @else
                      {{ $item->keahlian }}
                    @endif
                  </td>
                  <td>
                    <span style="display:inline-block;width:20px;height:20px;background-color:{{ $item->warna_tema }}"></span>
                    {{ $item->warna_tema }}
                  </td>
                  <td>
                    @if($item->lpl)
                      {{ $item->lpl->latitude }}, {{ $item->lpl->longitude }}
                    @else
                      -
                    @endif
                  </td>
                  <td>
                    @if($item->lpl && $item->lpl->layanan)
                      @if(is_array($item->lpl->layanan))
                        {{ implode(', ', $item->lpl->layanan) }}
                      @else
                        {{ $item->lpl->layanan }}
                      @endif
                    @else
                      -
                    @endif
                  </td>
                  <td>
                    @if($item->lpl && $item->lpl->terbuka_klien)
                      <span class="badge bg-success">Ya</span>
                    @else
                      <span class="badge bg-danger">Tidak</span>
                    @endif
                  </td>
                  <td>{{ $item->lpl->setuju ?? 'Belum ada' }}</td>
                  <td>
                    @if($item->gambar && count($item->gambar))
                      @foreach($item->gambar as $g)
                        <img src="{{ asset('storage/' . $g->file_path) }}" width="100">
                      @endforeach
                    @else
                      Tidak ada gambar
                    @endif
                  </td>
                  <td>
                    @if($item->item && count($item->item))
                      @foreach($item->item as $subitem)
                        <div style="margin-bottom:10px;">
                          <strong>{{ $subitem->judul_proyek }}</strong><br>
                          {{ $subitem->deskripsi_singkat }}<br>
                          <a href="{{ $subitem->url_proyek }}" target="_blank">{{ $subitem->url_proyek }}</a>
                        </div>
                      @endforeach
                    @else
                      Tidak ada item
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('admin.portofolio.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.portofolio.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
      @endif
    </div>
  </div>
@endsection
