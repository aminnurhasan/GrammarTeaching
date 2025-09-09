@extends('user.layouts.app')

@section('title', __('user.title'))

@section('content')
<style>
    /* CSS yang diadaptasi dari halaman soal pilihan ganda */
    .form-check-input[type="radio"] {
        display: none;
    }

    .custom-input {
        display: block;
        width: 100%;
        padding: 1rem;
        background-color: #f8f9fa;
        border: 2px solid #e2e8f0;
        border-radius: 0.5rem;
        cursor: text;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .custom-input:hover {
        background-color: #e2e8f0;
        border-color: #3b82f6;
        transform: translateY(-2px);
    }

    .custom-input:focus {
        background-color: #dbeafe;
        border-color: #3b82f6;
        color: #1e40af;
        outline: none;
    }

    .question-text-container {
        font-size: 1.1rem;
        font-weight: 500;
        line-height: 1.6;
    }

    .question-number {
        font-weight: bold;
        margin-right: 0.5rem;
    }

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
        display: none;
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

    .unanswered-question {
        border: 2px solid #ef4444;
        box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.2), 0 4px 6px -2px rgba(239, 68, 68, 0.1);
    }
</style>

<div class="container my-4">
    <div class="card shadow-sm p-4">
        <h1 class="card-title fw-bold text-center mb-4">Permainan Acak Kata</h1>
        <p class="text-center">Susun kembali kata-kata di bawah ini menjadi kalimat yang benar!</p>

        {{-- Form untuk mengirimkan jawaban, diarahkan ke route storeAcakKata --}}
        <form action="{{ route('kuis.acakKata.store') }}" method="POST" id="wordScrambleForm">
            @csrf
            {{-- Loop untuk setiap soal acak kata yang datang dari controller --}}
            @foreach ($soalAcakKata as $soal)
            <div class="card my-3 p-3 bg-white shadow-sm" data-question-id="{{ $soal->id }}">
                <div class="mb-3 d-flex flex-column align-items-center">
                    {{-- Mengacak kata-kata dari kalimat yang benar --}}
                    <?php
                        $kalimat = $soal->kalimat_benar;
                        $kata = explode(' ', $kalimat);
                        shuffle($kata);
                        $kalimat_acak = implode(' ', $kata);
                    ?>
                    <span class="question-number text-xl mb-3">{{ $loop->iteration }}.</span>
                    <span class="question-text-container font-bold text-2xl text-center">{{ $kalimat_acak }}</span>
                </div>
                <div>
                    {{-- Input field untuk jawaban pengguna --}}
                    <input type="text" name="ak[{{ $soal->id }}]" placeholder="Ketik jawabanmu di sini..." class="custom-input text-center text-lg md:text-xl font-medium">
                </div>
            </div>
            @endforeach
            
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-lg fw-bold">Selesai & Kirim Jawaban</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Peringatan (tersembunyi secara default) --}}
<div id="warningModal" class="warning-modal">
    <div class="warning-modal-content">
        <h5 class="fw-bold">Ada Soal yang Belum Terjawab!</h5>
        <p class="mt-3">Mohon periksa kembali, semua soal harus dijawab sebelum mengirim.</p>
        <button id="closeWarningBtn" class="btn btn-primary mt-3">Oke, Saya Mengerti</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('wordScrambleForm');
        const warningModal = document.getElementById('warningModal');
        const closeWarningBtn = document.getElementById('closeWarningBtn');
        const questionCards = document.querySelectorAll('[data-question-id]');
        const totalQuestions = questionCards.length;

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            let answeredCount = 0;

            // Hapus semua sorotan merah dari percobaan sebelumnya
            questionCards.forEach(card => {
                card.classList.remove('unanswered-question');
            });

            // Iterasi melalui setiap kartu soal
            questionCards.forEach(card => {
                const input = card.querySelector('input[type="text"]');
                if (input.value.trim() !== '') {
                    answeredCount++;
                } else {
                    card.classList.add('unanswered-question');
                }
            });

            // Periksa apakah semua soal sudah dijawab
            if (answeredCount === totalQuestions) {
                form.submit();
            } else {
                warningModal.style.display = 'flex';
            }
        });

        closeWarningBtn.addEventListener('click', function() {
            warningModal.style.display = 'none';
        });
    });
</script>
@endsection
