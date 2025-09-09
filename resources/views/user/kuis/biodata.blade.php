@extends('user.layouts.app')

@section('title', __('user.biodata_title'))

@section('content')
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="card-title fw-bold text-center mb-4">{{ __('user.judul_biodata') }}</h1>
            <p class="text-center">{{ __('user.deskripsi_biodata') }}</p>
            <form action="{{ route('kuis.biodata.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">{{ __('user.nama') }}</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">{{ __('user.tanggal_lahir') }}</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                </div>
                <div class="mb-3">
                    <label for="sekolah" class="form-label">{{ __('user.sekolah') }}</label>
                    <input type="text" class="form-control" id="sekolah" name="sekolah">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">{{ __('user.alamat') }}</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">{{ __('user.tombol_lanjut') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
