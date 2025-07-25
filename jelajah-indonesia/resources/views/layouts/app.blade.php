<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jelajah Indonesia')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        
       nav {
        background-color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 1rem;
    }

    nav a {
        color: #444647;
        text-decoration: none;
        margin-right: 1rem;
        font-weight: bold;
    }

    nav a:hover {
        text-decoration: underline;
    }
       
        header {
            padding: 3rem;
            text-align: center;
            color: white;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
   

    <div class="content">
        @yield('content')
    </div>

    <footer>
        <p>© 2025 Jelajah Indonesia</p>
    </footer>
</body>
</html>
