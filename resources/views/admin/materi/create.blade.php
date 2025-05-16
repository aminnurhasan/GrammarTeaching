@extends('admin.layouts.app')

@section('title', __('admin.add_materi'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.add_materi') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.materi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">{{ __('admin.kategori') }}</label>
                    <div class="d-flex align-items-center">
                        <select class="form-select @error('kategori_id') is-invalid @enderror me-2" id="kategori_id" name="kategori_id">
                            <option value="">{{ __('admin.pilih_kategori') }}</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('admin.kategori.create') }}" class="btn btn-outline-secondary btn-sm" style="white-space: nowrap; padding-top: 0.375rem; padding-bottom: 0.375rem; line-height: 1.5;">{{ __('admin.tambah_kategori_baru') }}</a>
                    </div>
                    @error('kategori_id')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">{{ __('admin.judul') }}</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="konten" class="form-label">{{ __('admin.konten') }}</label>
                    <textarea class="form-control @error('konten') is-invalid @enderror" id="konten" name="konten" rows="10">{{ old('konten') }}</textarea>
                    @error('konten')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="urutan" class="form-label">{{ __('admin.urutan') }} (Opsional)</label>
                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" value="{{ old('urutan') }}">
                    @error('urutan')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ __('admin.simpan') }}</button>
                <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">{{ __('admin.batal') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection