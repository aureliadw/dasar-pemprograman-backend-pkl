@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title">Daftar Pembayaran</h3>
      <a href="{{ route('admin.pembayaran.create') }}" class="btn btn-success btn-sm">+ Tambah Pembayaran</a>
    </div>

    <div class="card-body">
      @if($pembayarans->isEmpty())
        <div class="text-center text-muted">Belum ada data pembayaran.</div>
      @else
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>Setuju Syarat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pembayarans as $item)
                <tr>
                  <td>{{ $item->id }}</td>
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
                    <a href="{{ route('admin.pembayaran.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('admin.pembayaran.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
