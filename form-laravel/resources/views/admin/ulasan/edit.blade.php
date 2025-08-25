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

  <div class="container mt-4">
    <h4>Edit Ulasan</h4>
    <div class="card mt-3">
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

        <form action="{{ route('admin.ulasan.update', $ulasan->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <label for="rating" class="form-label">Rating</label><br>
            <div class="rating">
              @for ($i = 5; $i >= 1; $i--)
                <input 
                  type="radio" 
                  id="star{{ $i }}" 
                  name="rating" 
                  value="{{ $i }}" 
                  {{ old('rating', $ulasan->rating) == $i ? 'checked' : '' }}
                >
                <label for="star{{ $i }}" title="{{ $i }} Bintang">★</label>
              @endfor
            </div>
            @error('rating')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea 
              name="komentar" 
              id="komentar" 
              class="form-control @error('komentar') is-invalid @enderror" 
              rows="4" 
              required>{{ old('komentar', $ulasan->komentar) }}</textarea>
            @error('komentar')
              <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('admin.ulasan.index') }}" class="btn btn-secondary ms-2">Batal</a>
        </form>
      </div>
    </div>
  </div>
@endsection
