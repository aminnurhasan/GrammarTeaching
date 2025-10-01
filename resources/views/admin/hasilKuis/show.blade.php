@extends('admin.layouts.app')

@section('title', __('admin.detail_hasil_kuis'))

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-6 fw-bold text-gray-800">{{ __('admin.detail_hasil_kuis') }}</h1>
        <a href="{{ route('admin.hasilKuis.index') }}" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left me-2"></i> {{ __('admin.kembali_ke_daftar_hasil') }}
        </a>
    </div>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white py-3">
            {{-- Menggunakan key dengan placeholder untuk nama siswa --}}
            <h2 class="h4 mb-0">
                {{ __('admin.hasil_kuis_siswa', ['name' => $hasilKuis->user->nama ?? __('admin.pengguna_dihapus')]) }}
            </h2>
            {{-- Menggunakan key dengan placeholder untuk waktu selesai --}}
            <p class="mb-0 small text-white-50">
                {{ __('admin.waktu_selesai_label', ['time' => $hasilKuis->created_at->format('d M Y, H:i')]) }}
            </p>
        </div>
        <div class="card-body p-4 p-md-5">

            <div class="bg-light p-4 rounded-3 mb-5 border border-primary">
                {{-- Ringkasan Skor --}}
                <h3 class="h5 fw-bold text-dark mb-3">{{ __('admin.ringkasan_skor') }}</h3>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card p-3 h-100 shadow-sm d-flex justify-content-between align-items-center bg-white">
                            {{-- Skor Pilihan Ganda --}}
                            <span class="text-muted fw-medium">{{ __('admin.skor_pilihan_ganda_label') }}</span>
                            <span class="fs-4 fw-bold text-primary">{{ number_format($hasilKuis->skor_pilihan_ganda, 2) }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card p-3 h-100 shadow-sm d-flex justify-content-between align-items-center bg-white">
                            {{-- Skor Acak Kata --}}
                            <span class="text-muted fw-medium">{{ __('admin.skor_acak_kata_label') }}</span>
                            <span class="fs-4 fw-bold text-primary">{{ number_format($hasilKuis->skor_acak_kata, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                {{-- Detail Jawaban Pilihan Ganda --}}
                <h3 class="h5 fw-bold text-dark mb-4 border-bottom pb-2">{{ __('admin.detail_jawaban_pilihan_ganda') }}</h3>
                @if($hasilKuis->jawabanPilihanGandas->isEmpty())
                    <p class="text-muted">{{ __('admin.tidak_ada_jawaban_pilihan_ganda') }}</p>
                @else
                    @foreach($hasilKuis->jawabanPilihanGandas as $jawaban)
                        <div class="card mb-3 p-4 shadow-sm border-start {{ $jawaban->benar ? 'border-success' : 'border-danger' }} border-4">
                            <p class="h6 fw-bold mb-2 text-dark">
                                {{ __('admin.soal_ke', ['number' => $loop->iteration]) }}: {!! $jawaban->soalPilihanGanda->pertanyaan !!}
                            </p>

                            <ul class="list-unstyled ms-3 mb-3 small">
                                @php
                                    $correctOption = $jawaban->soalPilihanGanda->jawaban_benar;
                                @endphp
                                <li class="{{ $correctOption == 'A' ? 'fw-bold text-success' : '' }}">A: {{ $jawaban->soalPilihanGanda->opsi_a }}</li>
                                <li class="{{ $correctOption == 'B' ? 'fw-bold text-success' : '' }}">B: {{ $jawaban->soalPilihanGanda->opsi_b }}</li>
                                <li class="{{ $correctOption == 'C' ? 'fw-bold text-success' : '' }}">C: {{ $jawaban->soalPilihanGanda->opsi_c }}</li>
                                <li class="{{ $correctOption == 'D' ? 'fw-bold text-success' : '' }}">D: {{ $jawaban->soalPilihanGanda->opsi_d }}</li>
                            </ul>

                            <p class="text-muted mb-1">
                                {{ __('admin.jawaban_siswa_label') }}
                                <span class="{{ $jawaban->benar ? 'text-success' : 'text-danger' }} fw-semibold">
                                    <i class="fas {{ $jawaban->benar ? 'fa-check-circle' : 'fa-times-circle' }}"></i> {{ $jawaban->dijawab }}
                                </span>
                            </p>

                            <p class="text-muted">
                                {{ __('admin.jawaban_benar_label') }}
                                <span class="text-success fw-semibold">
                                    <i class="fas fa-check-circle"></i> {{ $jawaban->soalPilihanGanda->jawaban_benar }}
                                </span>
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>

            <div>
                {{-- Detail Jawaban Acak Kata --}}
                <h3 class="h5 fw-bold text-dark mb-4 border-bottom pb-2">{{ __('admin.detail_jawaban_acak_kata') }}</h3>
                @if($hasilKuis->jawabanAcakKatas->isEmpty())
                    <p class="text-muted">{{ __('admin.tidak_ada_jawaban_acak_kata') }}</p>
                @else
                    @foreach($hasilKuis->jawabanAcakKatas as $jawaban)
                        <?php
                            // Mengambil kalimat yang benar untuk ditampilkan
                            $kalimat_benar = $jawaban->soalAcakKata->kalimat_benar ?? __('admin.kalimat_benar_tidak_ditemukan');
                            
                            // Logika acak kata ini tidak diperlukan, tapi dipertahankan agar tampilan soal konsisten
                            $kata_acak = explode(' ', $kalimat_benar);
                            shuffle($kata_acak);
                            $kalimat_acak_tampil = implode(' ', $kata_acak);
                        ?>
                        <div class="card mb-3 p-4 shadow-sm border-start {{ $jawaban->benar ? 'border-success' : 'border-danger' }} border-4">
                            <p class="h6 fw-bold mb-2 text-dark">
                                {{-- Soal Acak Kata --}}
                                {{ __('admin.soal_acak_kata_label', ['number' => $loop->iteration, 'scrambled_words' => $kalimat_acak_tampil]) }}
                            </p>

                            <p class="text-muted mb-1">
                                {{ __('admin.jawaban_siswa_label') }}
                                <span class="{{ $jawaban->benar ? 'text-success' : 'text-danger' }} fw-semibold">
                                    <i class="fas {{ $jawaban->benar ? 'fa-check-circle' : 'fa-times-circle' }}"></i> "{{ $jawaban->dijawab }}"
                                </span>
                            </p>

                            <p class="text-muted">
                                {{ __('admin.jawaban_benar_label') }}
                                <span class="text-success fw-semibold">
                                    <i class="fas fa-check-circle"></i> "{{ $kalimat_benar }}"
                                </span>
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
