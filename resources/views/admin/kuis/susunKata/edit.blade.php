@extends('admin.layouts.app')

@section('title', __('admin.ubah_kuis_susun_kata'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.ubah_kuis_susun_kata') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            {{-- Form untuk mengedit soal. Menggunakan method POST dan @method('PUT'). --}}
            <form action="{{ route('admin.kuis.susunKata.update', $susunKata) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kalimat_benar" class="form-label">{{ __('admin.kata_atau_kalimat_benar') }}</label>
                    <input type="text" class="form-control" id="kalimat_benar" name="kalimat_benar" value="{{ old('kalimat_benar', $susunKata->kalimat_benar) }}" required>
                    @error('kalimat_benar')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="penjelasan" class="form-label">{{ __('admin.penjelasan_jawaban') }}</label>
                    <textarea class="form-control" id="penjelasan" name="penjelasan" rows="4">{{ old('penjelasan', $susunKata->penjelasan) }}</textarea>
                    @error('penjelasan')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-primary">{{ __('admin.ubah') }}</button>
                    <a href="{{ route('admin.kuis.susunKata') }}" class="btn btn-secondary">{{ __('admin.kembali') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
