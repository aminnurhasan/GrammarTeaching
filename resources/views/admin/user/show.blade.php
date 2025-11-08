@extends('admin.layouts.app')

@section('title', __('admin.detail_pengguna', ['nama' => $student->nama]))

@section('content')

<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.detail_data_siswa') }}</h1>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ __('admin.informasi_siswa', ['nama' => $student->nama]) }}</h5>
        </div>
        <div class="card-body">
            
            {{-- Notifikasi Sukses --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <dl class="row mb-0">
                
                {{-- Nama --}}
                <dt class="col-sm-3 text-muted">{{ __('admin.nama_lengkap') }}</dt>
                <dd class="col-sm-9">{{ $student->nama }}</dd>

                {{-- Role --}}
                <dt class="col-sm-3 text-muted">{{ __('admin.role_pengguna') }}</dt>
                <dd class="col-sm-9">
                    <span class="badge bg-success text-uppercase">{{ $student->role }}</span>
                </dd>
                
                {{-- Email --}}
                <dt class="col-sm-3 text-muted">{{ __('admin.email') }}</dt>
                <dd class="col-sm-9">{{ $student->email }}</dd>

                {{-- Sekolah --}}
                <dt class="col-sm-3 text-muted">{{ __('admin.sekolah') }}</dt>
                <dd class="col-sm-9">{{ $student->sekolah }}</dd>

                {{-- Tanggal Lahir --}}
                <dt class="col-sm-3 text-muted">{{ __('admin.tanggal_lahir') }}</dt>
                <dd class="col-sm-9">
                    {{ \Carbon\Carbon::parse($student->tanggal_lahir)->translatedFormat('d F Y') }}
                </dd>
                
                {{-- Alamat --}}
                <dt class="col-sm-3 text-muted">{{ __('admin.alamat') }}</dt>
                <dd class="col-sm-9">{{ $student->alamat }}</dd>

                {{-- Tanggal Bergabung --}}
                @if ($student->created_at)
                    <dt class="col-sm-3 text-muted">{{ __('admin.tanggal_bergabung') }}</dt>
                    <dd class="col-sm-9">
                        {{ \Carbon\Carbon::parse($student->created_at)->translatedFormat('d F Y H:i') }}
                    </dd>
                @endif
            </dl>
        </div>
        <div class="card-footer d-flex justify-content-between">
            {{-- Tombol Kembali --}}
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> {{ __('admin.kembali') }}
            </a>
            
            {{-- Tombol Edit --}}
            <a href="{{ route('admin.user.edit', $student) }}" class="btn btn-warning">
                <i class="fas fa-pencil-alt"></i> {{ __('admin.ubah_data_siswa') }}
            </a>
        </div>
    </div>
</div>
@endsection