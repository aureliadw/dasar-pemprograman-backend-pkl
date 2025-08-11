@extends('layouts.app')

@section('content')
  <style>
    .rating {
      display: inline-flex;
      direction: rtl;
    }
    .rating input {
      display: none;
    }
    .rating label {
      font-size: 30px;
      color: gray;
      cursor: pointer;
      padding: 0 3px;
      transition: color 0.2s ease-in-out;
    }
    .rating input:checked ~ label,
    .rating label:hover,
    .rating label:hover ~ label {
      color: gold;
    }
  </style>

  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title mb-0">Buat Ulasan</h3>
      <a href="{{ route('admin.ulasan.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
    </div>

    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.ulasan.store') }}" method="POST">
        @csrf

        <div class="mb-4">
          <label for="rating" class="form-label">Rating</label><br>
          <div class="rating">
            @for ($i = 5; $i >= 1; $i--)
              <input 
                type="radio" 
                id="star{{ $i }}" 
                name="rating" 
                value="{{ $i }}" 
                {{ old('rating') == $i ? 'checked' : '' }}
              >
              <label for="star{{ $i }}" title="{{ $i }} Bintang">★</label>
            @endfor
          </div>
          @error('rating')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        <x-textarea 
          label="Komentar" 
          name="komentar" 
          :required="true" 
          placeholder="Ceritakan pengalaman anda..." 
        />

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
@endsection
