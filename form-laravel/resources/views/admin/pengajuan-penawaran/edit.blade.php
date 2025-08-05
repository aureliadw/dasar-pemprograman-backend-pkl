@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Penawaran</h3>

    <form action="{{ route('admin.pengajuan-penawaran.update', $pengajuan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="jumlah_penawaran" class="form-label">Jumlah Penawaran</label>
            <input type="number" name="jumlah_penawaran" id="jumlah_penawaran" class="form-control" value="{{ old('jumlah_penawaran', $pengajuan->jumlah_penawaran) }}" required>
        </div>

        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea name="pesan" id="pesan" class="form-control">{{ old('pesan', $pengajuan->pesan) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="durasi_pengerjaan" class="form-label">Durasi Pengerjaan (hari)</label>
            <input type="number" name="durasi_pengerjaan" id="durasi_pengerjaan" class="form-control" value="{{ old('durasi_pengerjaan', $pengajuan->durasi_pengerjaan) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
