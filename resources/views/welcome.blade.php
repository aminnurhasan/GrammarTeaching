<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Happy Learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
            color: #343a40; /* Dark gray text */
        }   
        .hero {
            background-color: #e9ecef; /* Slightly darker gray for hero section */
            padding: 80px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff; /* Primary color for heading */
        }
        .hero p {
            font-size: 1.2rem;
            color: #6c757d; /* Secondary color for paragraph */
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .features {
            padding: 60px 0;
            background-color: #fff;
        }
        .feature-item {
            text-align: center;
            padding: 30px;
        }
        .feature-item i {
            font-size: 2.5rem;
            color: #28a745; /* Success color for icons */
            margin-bottom: 15px;
        }
        .feature-item h3 {
            font-size: 1.75rem;
            margin-bottom: 10px;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Happy Grammar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kuis</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLanguage" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bahasa
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownLanguage">
                            <li><a class="dropdown-item" href="#">Indonesia</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login Admin</a>
                    </li>
                </ul>
            </div>
        </nav>

        <section class="hero py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold">Asah Grammar Bahasa Inggrismu dengan Kuis Interaktif</h1>
                        <p class="lead">Platform belajar grammar yang dirancang khusus untuk siswa SMA. Materi lengkap, kuis menarik, dan hasil yang mudah dipahami.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Mulai Kuis Sekarang</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="features py-5 bg-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <i class="fas fa-book fa-3x text-info"></i>
                        <h3 class="mt-3">Materi Terstruktur</h3>
                        <p>Pelajari grammar langkah demi langkah dengan materi yang mudah dipahami.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <i class="fas fa-question-circle fa-3x text-success"></i>
                        <h3 class="mt-3">Kuis Menarik</h3>
                        <p>Uji kemampuanmu dengan berbagai jenis kuis yang interaktif.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <i class="fas fa-language fa-3x text-warning"></i>
                        <h3 class="mt-3">Dukungan Multibahasa</h3>
                        <p>Pilih bahasa Indonesia atau Inggris sesuai preferensimu.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} Happy Grammar</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>