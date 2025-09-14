@extends('user.layouts.app')

@section('title', __('user.title'))

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center py-4 rounded-top">
            <h1 class="display-5 fw-bold mb-2">Hasil Kuis</h1>
            <p class="lead">Terima kasih telah menyelesaikan kuis, {{ $hasilKuis->user->name }}!</p>
        </div>
    <div class="card-body p-4 p-md-5">

    <!-- Ringkasan Skor -->
    <div class="bg-light p-4 rounded-3 mb-5 border border-primary">
        <h2 class="h5 fw-bold text-dark mb-3">Ringkasan Skor Anda</h2>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card p-3 h-100 shadow-sm d-flex justify-content-between align-items-center">
                    <span class="text-muted fw-medium">Skor Pilihan Ganda:</span>
                    <span class="fs-4 fw-bold text-primary">{{ number_format($hasilKuis->skor_pilihan_ganda, 2) }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 h-100 shadow-sm d-flex justify-content-between align-items-center">
                    <span class="text-muted fw-medium">Skor Susun Kata:</span>
                    <span class="fs-4 fw-bold text-primary">{{ number_format($hasilKuis->skor_acak_kata, 2) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Jawaban Pilihan Ganda -->
    <div class="mb-5">
        <h2 class="h5 fw-bold text-dark mb-4 border-bottom pb-2">Detail Jawaban Pilihan Ganda</h2>
        @if($hasilKuis->jawabanPilihanGandas->isEmpty())
            <p class="text-muted">Tidak ada jawaban pilihan ganda yang ditemukan.</p>
        @else
            @foreach($hasilKuis->jawabanPilihanGandas as $jawaban)
                <div class="card mb-3 p-4 shadow-sm border-start {{ $jawaban->benar ? 'border-success' : 'border-danger' }} border-4">
                    <p class="h6 fw-bold mb-2 text-dark">Soal {{ $loop->iteration }}: {!! $jawaban->soalPilihanGanda->pertanyaan !!}</p>

                    <!-- Menampilkan pilihan jawaban -->
                    <ul class="list-unstyled ms-3 mb-3">
                        <li class="{{ $jawaban->soalPilihanGanda->jawaban_a == $jawaban->soalPilihanGanda->jawaban_benar ? 'fw-bold text-success' : '' }}"><i class="fas fa-circle-dot me-2"></i> Jawaban A: {{ $jawaban->soalPilihanGanda->opsi_a }}</li>
                        <li class="{{ $jawaban->soalPilihanGanda->jawaban_b == $jawaban->soalPilihanGanda->jawaban_benar ? 'fw-bold text-success' : '' }}"><i class="fas fa-circle-dot me-2"></i> Jawaban B: {{ $jawaban->soalPilihanGanda->opsi_b }}</li>
                        <li class="{{ $jawaban->soalPilihanGanda->jawaban_c == $jawaban->soalPilihanGanda->jawaban_benar ? 'fw-bold text-success' : '' }}"><i class="fas fa-circle-dot me-2"></i> Jawaban C: {{ $jawaban->soalPilihanGanda->opsi_c }}</li>
                        <li class="{{ $jawaban->soalPilihanGanda->jawaban_d == $jawaban->soalPilihanGanda->jawaban_benar ? 'fw-bold text-success' : '' }}"><i class="fas fa-circle-dot me-2"></i> Jawaban D: {{ $jawaban->soalPilihanGanda->opsi_d }}</li>
                    </ul>

                    <!-- Jawaban Anda -->
                    <p class="text-muted mb-1">
                        Jawaban Anda:
                        <span class="{{ $jawaban->benar ? 'text-success' : 'text-danger' }} fw-semibold">
                            <i class="fas {{ $jawaban->benar ? 'fa-check-circle' : 'fa-times-circle' }}"></i> {{ $jawaban->dijawab }}
                        </span>
                    </p>

                    <!-- Jawaban Benar -->
                    <p class="text-muted">
                        Jawaban Benar:
                        <span class="text-success fw-semibold">
                            <i class="fas fa-check-circle"></i> {{ $jawaban->soalPilihanGanda->jawaban_benar }}
                        </span>
                    </p>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Detail Jawaban Susun Kata -->
    <div>
        <h2 class="h5 fw-bold text-dark mb-4 border-bottom pb-2">Detail Jawaban Susun Kata</h2>
        @if($hasilKuis->jawabanAcakKatas->isEmpty())
            <p class="text-muted">Tidak ada jawaban susun kata yang ditemukan.</p>
        @else
            @foreach($hasilKuis->jawabanAcakKatas as $jawaban)
                <?php
                    // Mengacak ulang kalimat dari kalimat yang benar karena kalimat yang diacak tidak disimpan di database
                    $kalimat_benar = $jawaban->soalAcakKata->kalimat_benar;
                    $kata_acak = explode(' ', $kalimat_benar);
                    shuffle($kata_acak);
                    $kalimat_acak_tampil = implode(' ', $kata_acak);
                ?>
                <div class="card mb-3 p-4 shadow-sm border-start {{ $jawaban->benar ? 'border-success' : 'border-danger' }} border-4">
                    <p class="h6 fw-bold mb-2 text-dark">Soal {{ $loop->iteration }}: Susunlah kata-kata berikut: "{{ $kalimat_acak_tampil }}"</p>

                    <!-- Jawaban Anda -->
                    <p class="text-muted mb-1">
                        Jawaban Anda:
                        <span class="{{ $jawaban->benar ? 'text-success' : 'text-danger' }} fw-semibold">
                            <i class="fas {{ $jawaban->benar ? 'fa-check-circle' : 'fa-times-circle' }}"></i> "{{ $jawaban->dijawab }}"
                        </span>
                    </p>

                    <!-- Jawaban Benar -->
                    <p class="text-muted">
                        Jawaban Benar:
                        <span class="text-success fw-semibold">
                            <i class="fas fa-check-circle"></i> "{{ $jawaban->soalAcakKata->kalimat_benar }}"
                        </span>
                    </p>
                </div>
            @endforeach
        @endif
    </div>

</div>

</div>
@endsection