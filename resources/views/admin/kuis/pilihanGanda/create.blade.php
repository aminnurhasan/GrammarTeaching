@extends('admin.layouts.app')

@section('title', __('admin.tambah_kuis_pilihan_ganda'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.tambah_kuis_pilihan_ganda') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.kuis.pilihanGanda.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="pertanyaan">{{ __('admin.pertanyaan') }} <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" name="pertanyaan" rows="3">{{ old('pertanyaan') }}</textarea>
                    @error('pertanyaan')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="opsi_a">{{ __('admin.opsi_a') }} <span class="text-danger">*</span></label>
                    <input type="text" name="opsi_a" class="form-control @error('opsi_a') is-invalid @enderror" id="opsi_a" value="{{ old('opsi_a') }}" required>
                    @error('opsi_a')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="opsi_b">{{ __('admin.opsi_b') }} <span class="text-danger">*</span></label>
                    <input type="text" name="opsi_b" class="form-control @error('opsi_b') is-invalid @enderror" id="opsi_b" value="{{ old('opsi_b') }}" required>
                    @error('opsi_b')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="opsi_c">{{ __('admin.opsi_c') }} <span class="text-danger">*</span></label>
                    <input type="text" name="opsi_c" class="form-control @error('opsi_c') is-invalid @enderror" id="opsi_c" value="{{ old('opsi_c') }}" required>
                    @error('opsi_c')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="opsi_d">{{ __('admin.opsi_d') }} <span class="text-danger">*</span></label>
                    <input type="text" name="opsi_d" class="form-control @error('opsi_d') is-invalid @enderror" id="opsi_d" value="{{ old('opsi_d') }}" required>
                    @error('opsi_d')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="jawaban_benar">{{ __('admin.jawaban_benar') }} <span class="text-danger">*</span></label>
                    <select name="jawaban_benar" class="form-select @error('jawaban_benar') is-invalid @enderror" id="jawaban_benar" required>
                        <option value="">{{ __('admin.pilih_jawaban_benar') }}</option>
                        <option value="A" {{ old('jawaban_benar') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('jawaban_benar') == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ old('jawaban_benar') == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ old('jawaban_benar') == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                    @error('jawaban_benar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="penjelasan">{{ __('admin.penjelasan') }}</label>
                    <textarea class="form-control @error('penjelasan') is-invalid @enderror" id="penjelasan" name="penjelasan" rows="3">{{ old('penjelasan') }}</textarea>
                    @error('penjelasan')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin.simpan') }}</button>
                <a href="{{ route('admin.kuis.pilihanGanda') }}" class="btn btn-secondary">{{ __('admin.batal') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection