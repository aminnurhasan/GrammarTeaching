@extends('admin.layouts.app')

@section('title', __('admin.add_kategori'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.add_kategori') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.kategori.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">{{ __('admin.nama_kategori') }}</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{ __('admin.simpan') }}</button>
                <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">{{ __('admin.batal') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection