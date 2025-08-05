@extends('admin.layouts.app')

@section('title', __('admin.detail_kuis_pilihan_ganda'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.detail_kuis_pilihan_ganda') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.pertanyaan') }}:</label>
                <div class="border p-3 rounded bg-light">
                    {!! $pilihanGanda->pertanyaan !!}
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.opsi_a') }}:</label>
                <p class="form-control-static">{{ $pilihanGanda->opsi_a }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.opsi_b') }}:</label>
                <p class="form-control-static">{{ $pilihanGanda->opsi_b }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.opsi_c') }}:</label>
                <p class="form-control-static">{{ $pilihanGanda->opsi_c }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.opsi_d') }}:</label>
                <p class="form-control-static">{{ $pilihanGanda->opsi_d }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.jawaban_benar') }}:</label>
                <p class="form-control-static">{{ $pilihanGanda->jawaban_benar }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label font-weight-bold">{{ __('admin.penjelasan') }}:</label>
                <div class="border p-3 rounded bg-light">
                    {!! $pilihanGanda->penjelasan !!}
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.kuis.pilihanGanda') }}" class="btn btn-secondary">{{ __('admin.kembali') }}</a>
                <a href="{{ route('admin.kuis.pilihanGanda.edit', $pilihanGanda) }}" class="btn btn-warning">{{ __('admin.ubah') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection