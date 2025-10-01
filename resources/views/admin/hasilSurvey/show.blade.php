@extends('admin.layouts.app')

@section('title', __('admin.detail_hasil_survey'))

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 fw-bold text-gray-800">{{ __('admin.detail_hasil_survey') }}</h1>
        <a href="{{ url()->previous() }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left me-2"></i> {{ __('admin.kembali_ke_daftar_hasil_survey') }}
        </a>
    </div>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white py-3">
            <h2 class="h4 mb-0">
                {{ 
                    __('admin.hasil_survey_siswa', [
                        'name' => $hasilKuis->user->nama ?? __('admin.pengguna_dihapus')
                    ]) 
                }}
            </h2>
            <p class="mb-0 small text-white-50">
                {{ 
                    __('admin.waktu_selesai_survey_label', [
                        'time' => $hasilKuis->created_at->format('d M Y, H:i')
                    ]) 
                }}
            </p>
        </div>
        
        <div class="card-body p-4 p-md-5">

            <!-- Ringkasan Global -->
            <div class="bg-light p-4 rounded-3 mb-5 border border-primary">
                <h3 class="h5 fw-bold text-dark mb-3">{{ __('admin.ringkasan_data_survey') }}</h3>
                <p class="text-muted mb-1">
                    {{ __('admin.total_pertanyaan_survey_pertama') }} 
                    <span class="fw-bold text-dark">{{ $hasilKuis->jawabanSurveyPertama->count() }}</span>
                </p>
                <p class="text-muted mb-1">
                    {{ __('admin.total_pertanyaan_survey_kedua') }} 
                    <span class="fw-bold text-dark">{{ $hasilKuis->jawabanSurveyKedua->count() }}</span>
                </p>
            </div>

            <!-- Bagian 1: Survey Pertama (Pretest) -->
            <div class="mb-5">
                <h3 class="h5 fw-bold text-dark mb-4 border-bottom pb-2 text-primary">{{ __('admin.detail_jawaban_survey_pertama') }}</h3>
                
                @if($hasilKuis->jawabanSurveyPertama->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        {{ __('admin.tidak_ada_jawaban_survey_pertama') }}
                    </div>
                @else
                    @foreach($hasilKuis->jawabanSurveyPertama as $jawaban)
                        <div class="card mb-4 p-4 shadow-sm border-start border-info border-4">
                            
                            <p class="h6 fw-bold mb-2 text-dark">
                                {{ __('admin.pertanyaan_ke', ['number' => $loop->iteration]) }}: 
                                {!! $jawaban->pertanyaanSurvey->pertanyaan ?? __('admin.pertanyaan_tidak_ditemukan') !!}
                            </p>

                            <div class="bg-white p-3 border rounded-3 mt-3">
                                <p class="small text-muted mb-1">{{ __('admin.jawaban_siswa_survey_label') }}</p>
                                <p class="text-gray-700 fw-medium whitespace-pre-wrap">{{ $jawaban->jawaban }}</p>
                            </div>

                            @if (isset($jawaban->skor))
                            <div class="mt-3 p-2 bg-warning-light rounded-3 border border-warning">
                                <p class="text-sm text-warning-800 mb-0">{{ __('admin.skor_label') }} <span class="fw-bold">{{ $jawaban->skor }}</span></p>
                            </div>
                            @endif

                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Garis Pemisah -->
            <hr class="my-5 border-gray-200">

            <!-- Bagian 2: Survey Kedua (Posttest) -->
            <div>
                <h3 class="h5 fw-bold text-dark mb-4 border-bottom pb-2 text-primary">{{ __('admin.detail_jawaban_survey_kedua') }}</h3>
                
                @if($hasilKuis->jawabanSurveyKedua->isEmpty())
                    <div class="alert alert-warning" role="alert">
                        {{ __('admin.tidak_ada_jawaban_survey_kedua') }}
                    </div>
                @else
                    @foreach($hasilKuis->jawabanSurveyKedua as $jawaban)
                        <div class="card mb-4 p-4 shadow-sm border-start border-success border-4">
                            
                            <p class="h6 fw-bold mb-2 text-dark">
                                {{ __('admin.pertanyaan_ke', ['number' => $loop->iteration]) }}: 
                                {!! $jawaban->pertanyaanSurvey->pertanyaan ?? __('admin.pertanyaan_tidak_ditemukan') !!}
                            </p>

                            <div class="bg-white p-3 border rounded-3 mt-3">
                                <p class="small text-muted mb-1">{{ __('admin.jawaban_siswa_survey_label') }}</p>
                                <p class="text-gray-700 fw-medium whitespace-pre-wrap">{{ $jawaban->jawaban }}</p>
                            </div>

                            @if (isset($jawaban->skor))
                            <div class="mt-3 p-2 bg-warning-light rounded-3 border border-warning">
                                <p class="text-sm text-warning-800 mb-0">{{ __('admin.skor_label') }} <span class="fw-bold">{{ $jawaban->skor }}</span></p>
                            </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
