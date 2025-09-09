@extends('user.layouts.app')

@section('title', __('user.title'))

@section('content')
<style>
    /* Menyembunyikan radio button bawaan */
    .form-check-input[type="radio"] {
        display: none;
    }

    /* Styling untuk label agar terlihat seperti tombol */
    .custom-radio-label {
        display: block;
        padding: 1rem;
        background-color: #f8f9fa;
        border: 2px solid #e2e8f0;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    /* Efek saat label di-hover */
    .custom-radio-label:hover {
        background-color: #e2e8f0;
        border-color: #3b82f6;
        transform: translateY(-2px);
    }

    /* Efek saat radio button terpilih */
    .form-check-input[type="radio"]:checked + .custom-radio-label {
        background-color: #dbeafe;
        border-color: #3b82f6;
        color: #1e40af;
    }

    /* Mengatur jarak antar opsi */
    .option-item {
        margin-bottom: 0.75rem;
    }
    
    /* Styling untuk teks soal agar lebih jelas */
    .question-text-container {
        font-size: 1.1rem;
        font-weight: 500;
        line-height: 1.6;
    }

    /* Styling untuk nomor urut soal */
    .question-number {
        font-weight: bold;
        margin-right: 0.5rem;
    }

    /* Styling untuk modal peringatan */
    .warning-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .warning-modal-content {
        background-color: white;
        padding: 2rem;
        border-radius: 0.5rem;
        text-align: center;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        max-width: 400px;
        width: 90%;
    }

    /* ---- CSS Baru untuk menyoroti soal yang belum dijawab ---- */
    .unanswered-question {
        border: 2px solid #ef4444; /* Warna merah */
        box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.2), 0 4px 6px -2px rgba(239, 68, 68, 0.1);
    }
</style>

<div class="container my-4">
    <div class="card shadow-sm p-4">
        <h1 class="card-title fw-bold text-center mb-4">{{ __('user.heading') }}</h1>
        <p class="text-center">{{ __('user.instruction') }}</p>

        <form action="{{ route('kuis.pilihanGanda.store') }}" method="POST" id="pretestForm">
            @csrf
            {{-- Loop untuk setiap soal pilihan ganda --}}
            @foreach ($soalPilihanGanda as $soal)
            {{-- Tambahkan atribut data-question-id untuk identifikasi di JavaScript --}}
            <div class="card my-3 p-3 bg-white shadow-sm" data-question-id="{{ $soal->id }}">
                {{-- Menggunakan d-flex untuk memastikan nomor dan pertanyaan sebaris --}}
                <div class="mb-3 d-flex align-items-baseline">
                    <span class="question-number">{{ $loop->iteration }}.</span>
                    <span class="question-text-container">{!! $soal->pertanyaan !!}</span>
                </div>
                <div>
                    <?php
                        $options = [
                            'a' => $soal->opsi_a,
                            'b' => $soal->opsi_b,
                            'c' => $soal->opsi_c,
                            'd' => $soal->opsi_d,
                        ];
                    ?>
                    {{-- Loop untuk setiap opsi jawaban --}}
                    @foreach ($options as $key => $option)
                    <div class="option-item">
                        <input class="form-check-input" type="radio" name="pg[{{ $soal->id }}]" id="pg_{{ $soal->id }}_option_{{ $key }}" value="{{ $key }}">
                        <label class="custom-radio-label" for="pg_{{ $soal->id }}_option_{{ $key }}">
                            <span class="fw-bold me-2">{{ strtoupper($key) }}.</span> {{ $option }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-lg fw-bold">{{ __('user.next_button') }}</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Peringatan (tersembunyi secara default) --}}
<div id="warningModal" class="warning-modal d-none">
    <div class="warning-modal-content">
        <h5 class="fw-bold">{{ __('user.warning_title') }}</h5>
        <p class="mt-3">{{ __('user.warning_message') }}</p>
        <button id="closeWarningBtn" class="btn btn-primary mt-3">{{ __('user.warning_button') }}</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('pretestForm');
        const warningModal = document.getElementById('warningModal');
        const closeWarningBtn = document.getElementById('closeWarningBtn');
        const questionCards = document.querySelectorAll('[data-question-id]');
        const totalQuestions = questionCards.length;

        // Event listener untuk tombol submit form
        form.addEventListener('submit', function(event) {
            // Mencegah form submit secara default
            event.preventDefault();

            let answeredCount = 0;

            // Hapus semua sorotan merah dari percobaan sebelumnya
            questionCards.forEach(card => {
                card.classList.remove('unanswered-question');
            });

            // Iterasi melalui setiap kartu soal
            questionCards.forEach(card => {
                // Cari radio button yang terpilih di dalam kartu soal ini
                const answered = card.querySelector('input[type="radio"]:checked');

                if (answered) {
                    answeredCount++;
                } else {
                    // Jika tidak ada jawaban, tambahkan kelas untuk sorotan merah
                    card.classList.add('unanswered-question');
                }
            });

            // Memeriksa apakah jumlah soal yang dijawab sama dengan total soal
            if (answeredCount === totalQuestions) {
                // Jika semua soal sudah dijawab, form bisa disubmit
                form.submit();
            } else {
                // Jika ada soal yang belum dijawab, tampilkan modal peringatan
                warningModal.classList.remove('d-none');
            }
        });

        // Event listener untuk tombol tutup modal
        closeWarningBtn.addEventListener('click', function() {
            warningModal.classList.add('d-none');
        });
    });
</script>
@endsection
