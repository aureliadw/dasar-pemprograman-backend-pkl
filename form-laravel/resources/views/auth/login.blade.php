@extends('layouts.guest')

@section('content')
<style>
    body {
        background-color: #f5f6fa;
        font-family: 'Inter', sans-serif;
    }
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 1rem;
    }
    .login-card {
        background: #fff;
        border-radius: 10px;
        padding: 2rem;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }
    .login-title {
        font-size: 1.5rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 1.5rem;
        color: #333;
    }
    .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        border: 1px solid #ddd;
        transition: border-color 0.2s ease;
    }
    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: none;
    }
    .btn-primary {
        width: 100%;
        padding: 0.75rem;
        border-radius: 8px;
        font-weight: 600;
        background-color: #4f46e5;
        border: none;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #4338ca;
    }
    .form-check-label {
        font-size: 0.9rem;
        color: #555;
    }
    .extra-links {
        text-align: center;
        margin-top: 1rem;
        font-size: 0.9rem;
    }
    .extra-links a {
        color: #4f46e5;
        text-decoration: none;
    }
    .extra-links a:hover {
        text-decoration: underline;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <h2 class="login-title">Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger small p-2">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li style="font-size: 0.85rem;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Ingat saya</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm">Lupa password?</a>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <div class="extra-links">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
        </div>
    </div>
</div>
@endsection
