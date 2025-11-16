@extends('admin.layouts.app')

@section('title', __('admin.tambah_survey_pretest'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.tambah_survey_pretest') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.survey.pretest.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="pertanyaan">{{ __('admin.pertanyaan') }} <span class="text-danger">*</span></label>
                    <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" rows="3">{{ old('pertanyaan') }}</textarea>
                    @error('pertanyaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="urutan">{{ __('admin.urutan') }}</label>
                    {{-- Nilai urutan otomatis diisi dari controller --}}
                    <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" id="urutan" value="{{ old('urutan', $nextUrutan ?? 1) }}" min="1" readonly>
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin.simpan') }}</button>
                <a href="{{ route('admin.survey.pretest') }}" class="btn btn-secondary">{{ __('admin.batal') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection