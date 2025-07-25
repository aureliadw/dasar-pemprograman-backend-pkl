@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Destinasi Budaya</h2>

    <!-- Search Bar -->
    <div class="mb-4 d-flex justify-content-center">
        <input type="text" class="form-control w-50" placeholder="Cari budaya..." id="search" onkeyup="searchBudaya()">
    </div>

    <!-- Grid Container -->
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center" id="budayaContainer">
        @foreach ($budayaList as $wisata)
        <div class="col budaya-card">
            <div class="card shadow-lg h-100">
                <img src="{{ asset('images/' . $wisata->foto) }}" class="card-img-top square-image" alt="{{ $wisata->nama_wisata }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $wisata->nama_wisata }}</h5>
                    <!-- Rating Bintang -->
                    <p class="text-warning">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= floor($wisata->rating))
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                        ({{ $wisata->rating }})
                    </p>
                    <!-- Tombol Detail -->
                    <a href="{{ route('wisata.detail', ['kategori' => 'budaya', 'id' => $wisata->id]) }}" class="btn btn-primary">
                        Lihat Detail
                    </a>  
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- CSS Agar Foto Kotak & Rapi -->
<style>
    .square-image {
        height: 250px;
        width: 100%;
        object-fit: cover;
    }
    .budaya-card .card {
        min-height: 350px;
    }
</style>

<!-- JavaScript for Search -->
<script>
function searchBudaya() {
    let input = document.getElementById("search").value.toLowerCase();
    let budayaCards = document.querySelectorAll(".budaya-card");

    budayaCards.forEach(card => {
        let title = card.querySelector(".card-title").innerText.toLowerCase();
        card.style.display = title.includes(input) ? "block" : "none";
    });
}
</script>

@endsection
