<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('welcome.title'))</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" xintegrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Base Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Main Content Styling */
        main {
            padding-top: 15px;
            background-color: #ffffff;
            flex-grow: 1;
            border-radius: 8px;
            padding-left: 20px;
            padding-right: 20px;
            margin-top: 10px;
        }

        /* Footer Styling */
        footer {
            background-color: #212529;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 20px;
        }

        /* Hero Section (Contoh - bisa berbeda di halaman lain) */
        .hero {
            background-color: #e9ecef;
            padding: 80px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff;
        }
        .hero p {
            font-size: 1.2rem;
            color: #6c757d;
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

        /* Features Section (Contoh - bisa berbeda di halaman lain) */
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
            color: #28a745;
            margin-bottom: 15px;
        }
        .feature-item h3 {
            font-size: 1.75rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">Happy Grammar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLanguage" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('welcome.bahasa_dropdown') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownLanguage">
                                <li><a class="dropdown-item" href="{{ route('locale', 'id') }}">Indonesia</a></li>
                                <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">English</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('welcome.login') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">{{ __('register.header') }}</div>

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">{{ __('register.nama') }}</label>
                                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus style="background-color: #e9ecef; border: 1px solid #ced4da;">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('register.email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="background-color: #e9ecef; border: 1px solid #ced4da;">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('register.pass') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="background-color: #e9ecef; border: 1px solid #ced4da;">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">{{ __('register.pass_confirmation') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" style="background-color: #e9ecef; border: 1px solid #ced4da;">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">{{ __('register.tanggal_lahir') }}</label>
                                        <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required style="background-color: #e9ecef; border: 1px solid #ced4da;">
                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="sekolah" class="form-label">{{ __('register.sekolah') }}</label>
                                        <input id="sekolah" type="text" class="form-control @error('sekolah') is-invalid @enderror" name="sekolah" value="{{ old('sekolah') }}" required style="background-color: #e9ecef; border: 1px solid #ced4da;">
                                        @error('sekolah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">{{ __('register.alamat') }}</label>
                                        <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required rows="3" style="background-color: #e9ecef; border: 1px solid #ced4da;">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('register.register') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-dark text-white text-center py-3 mt-4">
            <p>&copy; {{ date('Y') }} Website Happy Grammar</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
