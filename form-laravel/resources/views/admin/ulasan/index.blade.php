@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="card-title mb-0">Daftar Ulasan</h5>
      <a href="{{ route('admin.ulasan.create') }}" class="btn btn-success btn-sm">+ Tambah Ulasan</a>
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
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">{{ $item->rating }} ★</td>
                  <td>{{ Str::limit($item->komentar, 60) }}</td>
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
      @endif
    </div>
  </div>
@endsection
