@extends('admin.layouts.app')

@section('title', __('admin.detail_materi'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.detail_materi') }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $materi->judul }}</h5>
            <p class="card-text"><strong>{{ __('admin.kategori') }}:</strong> {{ $materi->kategori->nama }}</p>
            <p class="card-text"><strong>{{ __('admin.slug') }}:</strong> {{ $materi->slug }}</p>
            <p class="card-text"><strong>{{ __('admin.urutan') }}:</strong> {{ $materi->urutan ?? '-' }}</p>
            <p class="card-text"><strong>{{ __('admin.konten') }}:</strong></p>
            <div class="card-text">{!! $materi->konten !!}</div>
             @if ($materi->file)
                <p class="card-text"><strong>{{ __('admin.file') }}:</strong>
                    <a href="{{ Storage::url($materi->file) }}" target="_blank" rel="noopener noreferrer">
                        {{ basename($materi->file) }}
                    </a>
                </p>
            @endif
            <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary mt-3">{{ __('admin.kembali') }}</a>
        </div>
    </div>
</div>
@endsection