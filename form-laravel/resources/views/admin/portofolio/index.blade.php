@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Portofolio</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.portofolio.create') }}" class="btn btn-primary mb-3">
        + Tambah Portofolio
    </a>

    <form action="{{ route('admin.portofolio.index') }}" method="GET" class="mb-3 d-flex" style="gap:10px; max-width:400px;">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            class="form-control" 
            placeholder="Cari judul atau keahlian..."
        >
        <select name="sort" class="form-control" onchange="this.form.submit()">
            <option value="id_desc" {{ request('sort') == 'id_desc' ? 'selected' : '' }}>ID Descending</option>
            <option value="id_asc" {{ request('sort') == 'id_asc' ? 'selected' : '' }}>ID Ascending</option>
        </select>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    @if($portofolio_satu->isEmpty())
        <div class="text-center text-muted">Belum ada data portofolio.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Ringkasan</th>
                    <th>Keahlian</th>
                    <th>Warna Tema</th>
                    <th>Koordinat</th>
                    <th>Layanan</th>
                    <th>Terbuka Klien</th>
                    <th>Setuju</th>
                    <th>Gambar</th>
                    <th>Item Proyek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($portofolio_satu as $portofolio)
                    <tr>
                        <td>{{ $portofolio->id }}</td>
                        <td>{{ $portofolio->judul_portofolio }}</td>
                        <td>{{ Str::limit(strip_tags($portofolio->ringkasan), 50) }}</td>
                        <td>
                            @php
                                try {
                                    $keahlianValue = $portofolio->keahlian;
                                    if (is_null($keahlianValue) || $keahlianValue === '') {
                                        echo '-';
                                    } elseif (is_string($keahlianValue)) {
                                        $decoded = json_decode($keahlianValue, true);
                                        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                            echo implode(', ', $decoded);
                                        } else {
                                            echo $keahlianValue;
                                        }
                                    } elseif (is_array($keahlianValue)) {
                                        echo implode(', ', $keahlianValue);
                                    } else {
                                        echo $keahlianValue;
                                    }
                                } catch (\Exception $e) {
                                    echo '-';
                                }
                            @endphp
                        </td>
                        <td>
                            <span style="display:inline-block;width:20px;height:20px;background-color:{{ $portofolio->warna_tema }}"></span>
                            {{ $portofolio->warna_tema }}
                        </td>
                        <td>
                            @if($portofolio->lpl)
                                {{ $portofolio->lpl->latitude }}, {{ $portofolio->lpl->longitude }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($portofolio->lpl && $portofolio->lpl->layanan)
                                @php 
                                    try {
                                        $layananValue = $portofolio->lpl->layanan;
                                        if (is_string($layananValue)) {
                                            $layanan = json_decode($layananValue, true);
                                            echo is_array($layanan) ? implode(', ', $layanan) : $layananValue;
                                        } elseif (is_array($layananValue)) {
                                            echo implode(', ', $layananValue);
                                        } else {
                                            echo $layananValue;
                                        }
                                    } catch (\Exception $e) {
                                        echo '-';
                                    }
                                @endphp
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $portofolio->lpl ? ($portofolio->lpl->terbuka_klien ? 'Ya' : 'Tidak') : '-' }}</td>
                        <td>{{ $portofolio->lpl ? ($portofolio->lpl->setuju ? 'Ya' : 'Belum ada') : 'Belum ada' }}</td>
                        <td>
                            @if($portofolio->gambar && $portofolio->gambar->count())
                                <div style="display:flex; flex-wrap:wrap; gap:5px; max-width:150px;">
                                    @foreach($portofolio->gambar->take(2) as $g)
                                        <img 
                                            src="{{ asset('storage/' . $g->file_path) }}" 
                                            style="width:50px; height:50px; object-fit:cover; cursor:pointer;" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#gambarModal{{ $portofolio->id }}"
                                        >
                                    @endforeach
                                    @if($portofolio->gambar->count() > 2)
                                        <span style="font-size:0.8em;">+{{ $portofolio->gambar->count() - 2 }}</span>
                                    @endif
                                </div>

                                <div class="modal fade" id="gambarModal{{ $portofolio->id }}" tabindex="-1" aria-labelledby="gambarModalLabel{{ $portofolio->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="gambarModalLabel{{ $portofolio->id }}">Gambar Portofolio: {{ $portofolio->judul_portofolio }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body d-flex flex-wrap gap-2">
                                                @foreach($portofolio->gambar as $g)
                                                    <img src="{{ asset('storage/' . $g->file_path) }}" style="width:100px; height:100px; object-fit:cover;">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>
                            @if($portofolio->items && $portofolio->items->count())
                                @foreach($portofolio->items->take(3) as $item)
                                    <div style="margin-bottom:10px; font-size:0.9em;">
                                        <strong>{{ $item->judul_proyek }}</strong><br>
                                        {{ Str::limit($item->deskripsi_singkat, 30) }}<br>
                                        <a href="{{ $item->url_proyek }}" target="_blank">Link</a>
                                    </div>
                                @endforeach
                                @if($portofolio->items->count() > 3)
                                    <div style="font-size:0.8em;">+{{ $portofolio->items->count() - 3 }} item lain</div>
                                @endif
                            @else
                                Tidak ada item
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.portofolio.edit', $portofolio->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <form action="{{ route('admin.portofolio.destroy', $portofolio->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $portofolio_satu->withQueryString()->onEachSide(1)->links('pagination::bootstrap-4') }}
        </div>

        <style>
            .pagination { justify-content: center; }
            .pagination .page-item .page-link { padding: 0.25rem 0.5rem; font-size: 0.875rem; }
        </style>
    @endif
</div>
@endsection
