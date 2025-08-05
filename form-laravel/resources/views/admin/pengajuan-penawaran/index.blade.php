@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">Daftar Pengajuan Penawaran</h3>
      <a href="{{ route('admin.pengajuan-penawaran.create') }}" class="btn btn-success btn-sm">+ Tambah Penawaran</a>
    </div>

    <div class="card-body">
      @if($pengajuans->isEmpty())
        <div class="text-center text-muted">Belum ada data penawaran.</div>
      @else
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Jumlah Penawaran</th>
                <th>Pesan</th>
                <th>Durasi Pengerjaan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pengajuans as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>Rp {{ number_format($item->jumlah_penawaran, 0, ',', '.') }}</td>
                  <td>{{ $item->pesan }}</td>
                  <td>
                    <span class="badge bg-info">{{ $item->durasi_pengerjaan }} hari</span>
                  </td>
                  <td>
                    <a href="{{ route('admin.pengajuan-penawaran.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.pengajuan-penawaran.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
