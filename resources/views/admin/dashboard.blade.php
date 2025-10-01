@extends('admin.layouts.app')

@section('title', __('admin.dashboard_title'))

@section('content')
<div class="container-fluid py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="display-4 fw-bold mb-0 text-gray-800">{{ __('admin.dashboard_header') }}</h1>
            {{-- Menggunakan variabel :name untuk personalisasi, yang akan diisi dengan data Auth::user()->nama --}}
            <p class="lead text-gray-600 mt-2">{{ __('admin.welcome_message', ['name' => Auth::user()->nama]) }}</p>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success border-0 shadow-sm" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- BARIS 1: Kartu Statistik Utama (4 Kartu) -->
    <div class="row g-4 mb-5 justify-content-center">

        <!-- Kartu 1: Total Siswa -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-lg rounded-xl overflow-hidden bg-white text-gray-800 border-start border-4 border-primary">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-users fa-2x text-primary opacity-75 me-3"></i>
                        {{-- Penggunaan terjemahan untuk judul kartu --}}
                        <h5 class="card-title fw-semibold mb-0 text-gray-600 small">{{ __('admin.total_students') }}</h5>
                    </div>
                    <h2 class="display-3 fw-bolder text-dark">{{ $totalSiswa ?? '...' }}</h2>
                    {{-- Penggunaan terjemahan untuk tombol detail --}}
                    <a href="#" class="stretched-link text-primary text-decoration-none small mt-2 d-block fw-medium">{{ __('admin.view_details') }} <i class="fas fa-arrow-right fa-xs ms-1"></i></a>
                </div>
            </div>
        </div>

        <!-- Kartu 2: Total Materi -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-lg rounded-xl overflow-hidden bg-white text-gray-800 border-start border-4 border-success">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-book-open fa-2x text-success opacity-75 me-3"></i>
                        <h5 class="card-title fw-semibold mb-0 text-gray-600 small">{{ __('admin.total_materials') }}</h5>
                    </div>
                    <h2 class="display-3 fw-bolder text-dark">{{ $totalMaterials ?? '...' }}</h2>
                    <a href="{{ route('admin.materi.index') }}" class="stretched-link text-success text-decoration-none small mt-2 d-block fw-medium">{{ __('admin.view_details') }} <i class="fas fa-arrow-right fa-xs ms-1"></i></a>
                </div>
            </div>
        </div>

        <!-- Kartu 3: Total Kuis -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-lg rounded-xl overflow-hidden bg-white text-gray-800 border-start border-4 border-warning">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-clipboard-check fa-2x text-warning opacity-75 me-3"></i>
                        <h5 class="card-title fw-semibold mb-0 text-gray-600 small">{{ __('admin.total_quizzes') }}</h5>
                    </div>
                    <h2 class="display-3 fw-bolder text-dark">{{ $totalQuizAttempts ?? '...' }}</h2>
                    <a href="{{ route('admin.kuis.index') }}" class="stretched-link text-warning text-decoration-none small mt-2 d-block fw-medium">{{ __('admin.view_details') }} <i class="fas fa-arrow-right fa-xs ms-1"></i></a>
                </div>
            </div>
        </div>

        <!-- Kartu 4: Total Survey -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-lg rounded-xl overflow-hidden bg-white text-gray-800 border-start border-4 border-info">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-poll-h fa-2x text-info opacity-75 me-3"></i>
                        <h5 class="card-title fw-semibold mb-0 text-gray-600 small">{{ __('admin.total_surveys') }}</h5>
                    </div>
                    <h2 class="display-3 fw-bolder text-dark">{{ $totalSurveyAttempts ?? '...' }}</h2>
                    <a href="#" class="stretched-link text-info text-decoration-none small mt-2 d-block fw-medium">{{ __('admin.view_details') }} <i class="fas fa-arrow-right fa-xs ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- BARIS 2: Rangkuman Hasil -->
    <h3 class="fw-bold text-gray-800 mb-4 mt-3">{{ __('admin.summary_heading') }}</h3>
    <div class="row g-4 justify-content-center align-items-stretch">

        <!-- Kartu Rangkuman Kuis Tergabung -->
        <div class="col-md-12 col-lg-6 d-flex flex-column">
            <h5 class="text-gray-700 fw-bold mb-3">{{ __('admin.quiz_summary_heading') }}</h5>
            <div class="card h-100 border-0 shadow-lg rounded-xl overflow-hidden bg-gray-100 text-gray-800 flex-grow-1">
                <div class="card-body p-4">
                    
                    <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
                        <i class="fas fa-trophy fa-3x text-dark opacity-50 me-4"></i>
                        <h4 class="card-title fw-bold mb-0 text-dark">{{ __('admin.quiz_summary_heading') }}</h4>
                    </div>

                    <div class="row g-3">
                        {{-- Data Rata-rata Pilihan Ganda --}}
                        <div class="col-md-6">
                            {{-- Pilihan Ganda (terdapat teks literal Pilihan Ganda untuk konteks di UI) --}}
                            <p class="small text-muted mb-1">{{ __('admin.average_mcq_score') }} (Pilihan Ganda):</p>
                            <h2 class="display-5 fw-bolder text-danger mb-0">{{ $averageMcqScore ?? 'N/A' }}</h2>
                            <p class="small text-gray-600 mt-1">{{ __('admin.quiz_mcq_description') }}</p>
                        </div>

                        {{-- Data Rata-rata Acak Kata --}}
                        <div class="col-md-6">
                            {{-- Acak Kata (terdapat teks literal Acak Kata untuk konteks di UI) --}}
                            <p class="small text-muted mb-1">{{ __('admin.average_word_quiz_score') }} (Acak Kata):</p>
                            <h2 class="display-5 fw-bolder text-dark mb-0">{{ $averageWordQuizScore ?? 'N/A' }}</h2>
                            <p class="small text-gray-600 mt-1">{{ __('admin.quiz_word_description') }}</p>
                        </div>
                    </div>

                    <a href="{{ route('admin.hasilKuis.index') }}" class="stretched-link text-secondary text-decoration-none small mt-4 pt-2 d-block fw-medium border-top">
                        {{ __('admin.view_details') }} {{ __('admin.quiz_summary_heading') }} <i class="fas fa-arrow-right fa-xs ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Kartu Rangkuman Hasil Survey -->
        <div class="col-md-12 col-lg-6 d-flex flex-column">
            <h5 class="text-gray-700 fw-bold mb-3">{{ __('admin.survey_summary_heading') }}</h5>
            <div class="card border-0 shadow-lg rounded-xl overflow-hidden bg-white text-gray-800 flex-grow-1">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-chart-bar fa-3x text-info opacity-75 me-4"></i>
                        {{-- Menggunakan key baru yang berarti "Total Siswa Pengisi Survey" --}}
                        <h4 class="card-title fw-bold mb-0 text-dark">{{ __('admin.surveys_completed_percent') }}</h4>
                    </div>
                    
                    <h2 class="display-3 fw-bolder text-info mt-3">{{ $totalSurveyAttempts ?? '0' }}</h2>
                    <p class="card-text text-gray-600 mt-3">{{ __('admin.survey_completed_description') }}</p>
                    
                    <a href="{{ route('admin.hasilSurvey.index') }}" class="stretched-link text-info text-decoration-none small mt-4 pt-2 d-block fw-medium border-top">
                        {{ __('admin.view_details') }} {{ __('admin.survey_summary_heading') }} <i class="fas fa-arrow-right fa-xs ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
