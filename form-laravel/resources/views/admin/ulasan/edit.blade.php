@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Ulasan</h4>
    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('admin.ulasan.update', $ulasan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="{{ old('rating', $ulasan->rating) }}" required>
                </div>

                <div class="mb-3">
                    <label for="komentar" class="form-label">Komentar</label>
                    <textarea name="komentar" id="komentar" class="form-control" rows="4" required>{{ old('komentar', $ulasan->komentar) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.ulasan.index') }}" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
