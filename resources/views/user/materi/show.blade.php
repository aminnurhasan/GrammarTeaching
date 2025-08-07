@extends('user.layouts.app')

@section('title', $materi->judul)

@section('content')
<div class="container my-2">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="text-center mb-4 fw-bold">~ {{ __('user.judul_materi') }} ~</h1>
            
            <h2 class="card-title fw-bold">{{ $materi->judul }}</h2>
            
            @if ($materi->kategori)
                <span class="badge bg-primary text-white mb-3">{{ $materi->kategori->judul }}</span>
            @endif

            <hr>

            <div class="mt-4">
                {!! $materi->konten !!}
            </div>

            <a href="{{ url('/') }}" class="btn btn-outline-primary mt-4">
                <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
