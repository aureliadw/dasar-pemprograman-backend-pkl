<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelajah Indonesia</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Navbar */
        .navbar {
            transition: background-color 0.5s ease;
        }
        .navbar.scrolled {
            background: white !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            color: white !important;
        }
        .navbar.scrolled a {
            color: black !important;
        }
        /* Hero Section */
        .hero {
            background: url('{{ asset('images/background.jpg') }}') no-repeat center center/cover;
            height: 100vh;
            position: relative;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }
        .hero-content p {
            font-size: 1.2rem;
        }
        .hero-content a {
            margin-top: 20px;
            padding: 10px 20px;
            background: white;
            color: black;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .hero-content a:hover {
            background: #ff7f50;
            color: white;
        }
        /* Features Section */
        .features {
            padding: 50px 0;
            text-align: center;
        }
        .feature-item {
            transition: transform 0.3s ease;
        }
        .feature-item:hover {
            transform: scale(1.05);
        }
        .feature-icon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 20px auto;
        }

    </style>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand text-white" href="#">Jelajah Indonesia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#destinations">Destinations</a></li>

                <!-- Jika pengguna sudah login, tampilkan Dashboard dan Logout -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Welcome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endauth

                <!-- Jika pengguna belum login, tampilkan Login dan Registrasi -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrasi</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>jelajah Indonesia</h1>
            <p>Temukan Destinasi Wisata Terbaik di Indonesia</p>
            <a href="#destinations">Explore Now</a>
        </div>
    </section>

    <!-- Section About -->
<section id="about" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 700;">Tentang Jelajah Indonesia</h2>
        <p class="text-center lead" style="font-family: 'Roboto', sans-serif; font-size: 1.1rem; color: #555;">
            Selamat datang di <strong style="color: #007BFF;">Jelajah Indonesia</strong>! Kami hadir untuk memberikan rekomendasi wisata terbaik dari seluruh penjuru Nusantara. Dari pantai yang memesona hingga budaya yang memukau, kami menjadi panduan perjalanan terpercaya bagi Anda.
        </p>

        <div class="row mt-5">
            <!-- Kolom 1 -->
            <div class="col-md-6 mb-4">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h4 class="mb-3" style="font-family: 'Poppins', sans-serif; color: #007BFF;"><i class="bi bi-geo-alt-fill me-2"></i>Mengapa Jelajah Indonesia?</h4>
                    <ul style="list-style: none; padding-left: 0; font-family: 'Roboto', sans-serif; color: #333;">
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-star-fill text-warning me-3 fs-4"></i>
                            <span><strong>Destinasi wisata populer</strong> seperti Bali, Raja Ampat, dan Borobudur.</span>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-chat-left-text-fill text-info me-3 fs-4"></i>
                            <span><strong>Ulasan wisatawan</strong> untuk membantu Anda merencanakan perjalanan dengan lebih baik.</span>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-sun-fill text-danger me-3 fs-4"></i>
                            <span><strong>Rekomendasi aktivitas</strong> seperti snorkeling, mendaki, hingga menikmati festival lokal.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Kolom 2 -->
            <div class="col-md-6 mb-4">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h4 class="mb-3" style="font-family: 'Poppins', sans-serif; color: #FF5733;"><i class="bi bi-flag-fill me-2"></i>Komitmen Kami</h4>
                    <ul style="list-style: none; padding-left: 0; font-family: 'Roboto', sans-serif; color: #333;">
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-check-circle-fill text-primary me-3 fs-4"></i>
                            <span><strong>Informasi akurat dan up-to-date</strong> untuk semua destinasi.</span>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-lightbulb-fill text-warning me-3 fs-4"></i>
                            <span><strong>Menginspirasi</strong> Anda untuk menjelajahi keindahan Indonesia.</span>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="bi bi-tree-fill text-success me-3 fs-4"></i>
                            <span><strong>Kesadaran lingkungan</strong> untuk menjaga kelestarian alam dan budaya.</span>
                        </li>
                    </ul>
                    <a href="#destinations" class="btn btn-primary mt-3" style="font-family: 'Poppins', sans-serif; font-weight: 600; padding: 10px 20px; border-radius: 25px;">Jelajahi Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tambahkan Link Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">


<!--features -->
<section class="features" id="destinations">
    <h2 class="mb-5 text-center">Destinasi Populer</h2>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 feature-item">
                <a href="{{ url('/beach') }}">
                    <img src="{{ asset('images/icons/beach.png') }}" alt="Pantai" class="feature-icon">
                    <h5>Pantai</h5>
                    <p>Indahnya pantai di Indonesia.</p>
                </a>
            </div>
            <div class="col-md-3 feature-item">
                <a href="{{ url('/gunung') }}">
                    <img src="{{ asset('images/icons/mountain.webp') }}" alt="Gunung" class="feature-icon">
                    <h5>Gunung</h5>
                    <p>Keindahan gunung untuk hiking.</p>
                </a>
            </div>
            <div class="col-md-3 feature-item">
                <a href="{{ url('/budaya') }}">
                    <img src="{{ asset('images/icons/budaya.jpg') }}" alt="Budaya" class="feature-icon">
                    <h5>Budaya</h5>
                    <p>Jelajahi budaya Indonesia yang beragam.</p>
                </a>
            </div>
            <div class="col-md-3 feature-item">
                <a href="{{ url('/kuliner') }}">
                    <img src="{{ asset('images/icons/kuliner.jpg') }}" alt="Kuliner" class="feature-icon">
                    <h5>Kuliner</h5>
                    <p>Kuliner Indonesia yang tidak kalah enak.</p>
                </a>
            </div>
        </div>
    </div>
</section>



  <!-- Wisata Terpopuler Section (Carousel) -->
<section class="features" id="popular-destinations">
    <h2 class="mb-5">Wisata Terpopuler</h2>
    <div class="container">
        <div id="popularDestinationsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Card 1 -->
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/pantai kuta.webp') }}" class="card-img-top" alt="Wisata 1">
                                <div class="card-body">
                                    <h5 class="card-title">Pantai Kuta</h5>
                                    <p class="card-text">Pantai Kuta adalah salah satu pantai terbaik di Bali, terkenal dengan pemandangannya yang indah.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/gunung bromo.jpg') }}" class="card-img-top" alt="Wisata 2">
                                <div class="card-body">
                                    <h5 class="card-title">Gunung Bromo</h5>
                                    <p class="card-text">Gunung Bromo menawarkan pemandangan matahari terbit yang memukau dan merupakan tujuan wisata populer.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/candi borobudur.jpg') }}" class="card-img-top" alt="Wisata 3">
                                <div class="card-body">
                                    <h5 class="card-title">Candi Borobudur</h5>
                                    <p class="card-text">Candi Borobudur merupakan situs warisan dunia yang terkenal dengan arsitektur luar biasa dan sejarah panjang.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 2 (example if you have more items) -->
                <div class="carousel-item">
                    <div class="row">
                        <!-- Add more cards as needed -->
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/pantai sanur.avif') }}" class="card-img-top" alt="Wisata 4">
                                <div class="card-body">
                                    <h5 class="card-title">Pantai Sanur</h5>
                                    <p class="card-text">Pantai Sanur dengan pemandangan matahari terbit yang menawan di Bali.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/labuanbajo.jpg') }}" class="card-img-top" alt="Wisata 4">
                                <div class="card-body">
                                    <h5 class="card-title">Labuan Bajo</h5>
                                    <p class="card-text">Labuan Bajo dikenal sebagai surga tersembunyi di Indonesia bagian timur.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/rajaampat.webp') }}" class="card-img-top" alt="Wisata 4">
                                <div class="card-body">
                                    <h5 class="card-title">Raja Ampat</h5>
                                    <p class="card-text">Raja Ampat merupakan salah satu objek wisata Indonesia yang mendunia dan diakui Unesco.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Add more cards as needed -->

                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#popularDestinationsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#popularDestinationsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>


<!-- Acara Terkini Section (Carousel) -->
<section class="features" id="events">
    <h2 class="mb-5">Acara Terkini</h2>
    <div class="container">
        <div id="eventsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Card 1 -->
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/napak.webp') }}" class="card-img-top" alt="Event 1">
                                <div class="card-body">
                                    <h5 class="card-title">Napak Tilas Situs Perjanjian Giyanti</h5>
                                    <p class="card-text">Diadakan pada 13 Februari 2025 di Situs Perjanjian Giyanti, Kabupaten Karanganyar, Jawa Tengah. Acara ini merupakan peringatan sejarah dengan berbagai kegiatan budaya dan edukatif.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/lari.jpg') }}" class="card-img-top" alt="Event 1">
                                <div class="card-body">
                                    <h5 class="card-title">Coast to Coast Night Trail Ultra 2025</h5>
                                    <p class="card-text">Diadakan pada 22–23 Februari 2025 di Yogyakarta. Event lari lintas alam ini menawarkan pengalaman berlari dari pantai selatan hingga kota Yogyakarta, sambil menikmati keindahan alam dan budaya setempat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/sungaimusi.jpg') }}" class="card-img-top" alt="Event 1">
                                <div class="card-body">
                                    <h5 class="card-title">Festival Sungai Musi 2025</h5>
                                    <p class="card-text">Upaya Pemkot Palembang Tarik Wisatawan dan Promosikan Potensi Wisata Sungai Musi.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Add more cards as needed -->
                    </div>
                </div>
                <!-- Card 2 (example if you have more events) -->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/tionghoa.jpeg') }}" class="card-img-top" alt="Event 2">
                                <div class="card-body">
                                    <h5 class="card-title">Pekan Budaya Tionghoa Yogyakarta XX</h5>
                                    <p class="card-text">Pekan Budaya Tionghoa Yogyakarta (PBTY) kembali hadir untuk yang ke-20 kalinya! Acara budaya akbar ini akan berlangsung mulai Kamis, 6 Februari hingga Rabu, 12 Februari 2025, di Kampung Ketandan, Yogyakarta. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/bogor.webp') }}" class="card-img-top" alt="Event 1">
                                <div class="card-body">
                                    <h5 class="card-title">Bogor Street Fest Cap Go Meh</h5>
                                    <p class="card-text">Dilaksanakan pada 12 Februari 2025 di Jalan Surya Kencana, Kota Bogor, Jawa Barat. Festival ini menampilkan parade budaya, pertunjukan seni, dan berbagai kuliner khas yang mencerminkan keragaman budaya di Bogor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/baunyale.jpg') }}" class="card-img-top" alt="Event 1">
                                <div class="card-body">
                                    <h5 class="card-title">Festival Pesona Bau Nyale</h5>
                                    <p class="card-text">Berlangsung pada 16–19 Februari 2025 di Pantai Kuta Mandalika dan Pantai Seger Mandalika, Lombok Tengah, Nusa Tenggara Barat. Festival ini merayakan legenda Putri Mandalika dengan berbagai kegiatan budaya dan lomba tradisional.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#eventsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
    
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
