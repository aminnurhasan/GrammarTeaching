@extends('admin.layouts.app')

@section('title', __('admin.ubah_data_pengguna', ['nama' => $student->nama]))

@section('content')

<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.ubah_data_siswa_title') }}</h1>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">{{ __('admin.form_perubahan_data', ['nama' => $student->nama]) }}</h5>
        </div>
        <div class="card-body">
            
            {{-- Notifikasi Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form untuk mengupdate data siswa --}}
            <form action="{{ route('admin.user.update', $student) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Field Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">{{ __('admin.label_nama_lengkap') }}</label>
                    <input 
                        type="text" 
                        class="form-control @error('nama') is-invalid @enderror" 
                        id="nama" 
                        name="nama" 
                        value="{{ old('nama', $student->nama) }}" 
                        required
                    >
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('admin.label_email') }}</label>
                    <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $student->email) }}" 
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- Field Sekolah --}}
                <div class="mb-3">
                    <label for="sekolah" class="form-label">{{ __('admin.label_nama_sekolah') }}</label>
                    <input 
                        type="text" 
                        class="form-control @error('sekolah') is-invalid @enderror" 
                        id="sekolah" 
                        name="sekolah" 
                        value="{{ old('sekolah', $student->sekolah) }}" 
                        required
                    >
                    @error('sekolah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field Tanggal Lahir --}}
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">{{ __('admin.label_tanggal_lahir') }}</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field Alamat --}}
                <div class="mb-3">
                    <label for="alamat" class="form-label">{{ __('admin.label_alamat_lengkap') }}</label>
                    <textarea 
                        class="form-control @error('alamat') is-invalid @enderror" 
                        id="alamat" 
                        name="alamat" 
                        rows="3"
                    >{{ old('alamat', $student->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Field Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('admin.label_password_baru') }}</label>
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        name="password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> {{ __('admin.batal') }}
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> {{ __('admin.simpan_perubahan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection