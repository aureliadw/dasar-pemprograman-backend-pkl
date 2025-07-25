@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Card utama untuk detail wisata -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="row g-0">
            <!-- Kolom Gambar -->
            <div class="col-md-5">
                <img src="{{ asset('images/' . $wisata->foto) }}" class="img-fluid rounded-start">
            </div>

            <!-- Kolom Detail -->
            <div class="col-md-7 p-4">
                <h3 class="fw-bold text-primary">{{ $wisata->nama_wisata }}</h3>
                <p class="text-muted">{{ $wisata->deskripsi }}</p>

                <!-- Rating -->
                <h5 class="mt-3">Rating: 
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa fa-star{{ $i <= $wisata->rating ? ' text-warning' : '-o text-secondary' }}"></i>
                    @endfor
                    <span class="text-muted ms-2">({{ number_format($wisata->rating, 1) }})</span>
                </h5>

                <!-- Google Maps -->
                <div class="mt-3">
                    <h5 class="text-primary">Lokasi</h5>
                    <iframe class="rounded-3 shadow-sm" width="100%" height="200" src="https://www.google.com/maps?q={{ $wisata->lokasi }}&output=embed"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Kolom Ulasan -->
    <div class="card shadow-sm border-0 rounded-3 mt-4">
        <div class="card-body">
            <h4 class="mb-3 text-primary">Ulasan Pengunjung</h4>

            <!-- Form Tambah Ulasan -->
            @if(Auth::check()) 
                <form action="{{ route('ulasan.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="id_wisata" value="{{ $wisata->id }}">

                    <!-- Pilihan Rating -->
                    <div class="mb-3">
                        <label for="peringkat" class="form-label">Beri Rating:</label>
                        <select name="peringkat" id="peringkat" class="form-control" required>
                            <option value="5">★★★★★</option>
                            <option value="4">★★★★☆</option>
                            <option value="3">★★★☆☆</option>
                            <option value="2">★★☆☆☆</option>
                            <option value="1">★☆☆☆☆</option>
                        </select>
                    </div>

                    <!-- Komentar -->
                    <div class="mb-3">
                        <textarea name="komentar" class="form-control" rows="3" placeholder="Tulis ulasan..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Kirim Ulasan</button>
                </form>
            @else
                <p class="text-center text-muted">Silakan <a href="{{ route('login') }}">login</a> untuk memberikan ulasan.</p>
            @endif

            <!-- Daftar Ulasan -->
            @if ($ulasan->count() > 0)
                <ul class="list-group">
                    @foreach ($ulasan as $u)
                        <li class="list-group-item d-flex gap-3 align-items-start border-0 py-2">
                            <!-- Avatar -->
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fa fa-user text-secondary"></i>
                            </div>
                            <!-- Komentar -->
                            <div>
                                <strong class="text-dark">{{ $u->pengguna->name }}</strong>
                                <p class="mb-1 text-muted small">{{ $u->tanggal_ulasan->format('d M Y') }}</p>
                                <p class="mb-0">{{ $u->komentar }}</p>
                                <p class="text-warning mb-0">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $u->peringkat)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted text-center py-3">Belum ada ulasan.</p>
            @endif
        </div>
    </div>
</div>
@endsection
