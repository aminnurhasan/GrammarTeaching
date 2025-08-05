@extends('admin.layouts.app')

@section('title', __('admin.kuis_susun_kata'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.kuis_susun_kata') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                {{-- Tombol kembali ke halaman utama kuis --}}
                <a href="{{ route('admin.kuis.index') }}" class="btn btn-secondary">{{ __('admin.kembali') }}</a>
                {{-- Tombol untuk menambah soal susun kata baru --}}
                <a href="{{ route('admin.kuis.susunKata.create') }}" class="btn btn-primary">{{ __('admin.tambah_kuis_susun_kata') }}</a>
            </div>

            <h6 class="card-title">{{ __('admin.daftar_kuis_susun_kata') }}</h6>
            {{-- Periksa apakah ada soal susun kata yang tersedia --}}
            @if ($soalSusunKata->isNotEmpty())
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered rounded-md overflow-hidden">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">{{ __('admin.kata_benar') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            {{-- Lakukan iterasi pada setiap soal susun kata --}}
                            @foreach ($soalSusunKata as $susunKata)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $susunKata->kalimat_benar }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Tombol untuk melihat detail soal --}}
                                            <a href="{{ route('admin.kuis.susunKata.show', $susunKata) }}" class="btn btn-sm btn-info" title="{{ __('admin.lihat') }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            {{-- Tombol untuk mengedit soal --}}
                                            <a href="{{ route('admin.kuis.susunKata.edit', $susunKata) }}" class="btn btn-sm btn-warning" title="{{ __('admin.ubah') }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            {{-- Form untuk menghapus soal --}}
                                            <form action="{{ route('admin.kuis.susunKata.destroy', $susunKata) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ __('admin.hapus') }}" onclick="return confirm('{{ __('admin.konfirmasi_hapus_kuis') }}')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                {{-- Tampilkan pesan jika tidak ada soal yang tersedia --}}
                <p class="text-muted text-center lead">{{ __('admin.tidak_ada_kuis_susun_kata') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection