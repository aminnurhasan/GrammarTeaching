@extends('admin.layouts.app')

@section('title', __('admin.detail_kuis_susun_kata'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.detail_kuis_susun_kata') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.kata_atau_kalimat_benar') }}:</label>
                <div class="border p-3 rounded bg-light">
                    {{ $susunKata->kalimat_benar }}
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.penjelasan_jawaban') }}:</label>
                <div class="border p-3 rounded bg-light">
                    {!! $susunKata->penjelasan !!}
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.kuis.susunKata') }}" class="btn btn-secondary">{{ __('admin.kembali') }}</a>
                <a href="{{ route('admin.kuis.susunKata.edit', $susunKata) }}" class="btn btn-warning">{{ __('admin.ubah') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
