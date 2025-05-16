@extends('admin.layouts.app')

@section('title', __('admin.ubah_materi'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.ubah_materi') }}</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="judul">{{ __('admin.judul') }} <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" value="{{ old('judul', $materi->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="kategori_id">{{ __('admin.kategori') }} <span class="text-danger">*</span></label>
                    <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" required>
                        <option value="" selected disabled>{{ __('admin.pilih_kategori') }}</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id', $materi->kategori_id) == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="konten">{{ __('admin.konten') }} <span class="text-danger">*</span></label>
                    <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" id="konten" rows="5" required>{{ old('konten', $materi->konten) }}</textarea>
                    @error('konten')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="urutan">{{ __('admin.urutan') }}</label>
                    <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" id="urutan" value="{{ old('urutan', $materi->urutan) }}" min="1">
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin.simpan') }}</button>
                <a href="{{ route('admin.materi.index') }}" class="btn btn-secondary">{{ __('admin.batal') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection