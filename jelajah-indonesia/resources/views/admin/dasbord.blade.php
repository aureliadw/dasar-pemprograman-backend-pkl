@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Dashboard Admin</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Kategori</h5>
                    <p class="card-text">{{ $totalKategori }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Wisata</h5>
                    <p class="card-text">{{ $totalWisata }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-primary">Kelola Kategori</a>
        <a href="{{ route('admin.wisata.index') }}" class="btn btn-success">Kelola Wisata</a>
    </div>
</div>
@endsection
