@extends('admin.layouts.app')

@section('title', __('admin.materi_title'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.materi_header') }}</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.materi.create') }}" class="btn btn-primary">{{ __('admin.add_materi') }}</a>
        <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-secondary">{{ __('admin.kelola_kategori') }}</a>
    </div>

    @if ($totalMateri > 0)
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-3">
                        <h6>{{ __('admin.total_kategori') }}</h6>
                        <span class="font-weight-bold">{{ $totalKategori }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-3">
                        <h6>{{ __('admin.total_materi') }}</h6>
                        <span class="font-weight-bold">{{ $totalMateri }}</span>
                    </div>
                </div>
            </div>
        </div>

        @if ($kategoriDenganJumlahMateri->isNotEmpty())
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-3">
                    <h6>{{ __('admin.materi_berdasarkan_kategori') }}</h6>
                    <ul class="list-unstyled">
                        @foreach ($kategoriDenganJumlahMateri as $kategori)
                            <li>{{ $kategori->nama }}: <span class="font-weight-bold">{{ $kategori->materis_count }}</span> {{ __('admin.materi_plural') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="card border-0 shadow-sm" style="background-color:rgb(255, 255, 255);">
            <div class="card-body">
                <h6 class="card-title">{{ __('admin.daftar_materi') }}</h6>
                @if ($materis->isNotEmpty())
                    <div class="table-responsive">
                        <table id="tabel" class="table table-striped table-bordered rounded-md overflow-hidden">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">{{ __('admin.judul') }}</th>
                                    <th scope="col">{{ __('admin.kategori') }}</th>
                                    <th scope="col">{{ __('admin.urutan') }}</th>
                                    <th scope="col" class="text-center">{{ __('admin.aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($materis as $materi)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $materi->judul }}</td>
                                        <td>{{ $materi->kategori->nama }}</td>
                                        <td>{{ $materi->urutan ?? '-' }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('admin.materi.show', $materi->id) }}" class="btn btn-sm btn-info" title="{{ __('admin.lihat') }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.materi.edit', $materi->id) }}" class="btn btn-sm btn-warning" title="{{ __('admin.ubah') }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.materi.destroy', $materi->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ __('admin.hapus') }}" onclick="return confirm('{{ __('admin.konfirmasi_hapus_materi') }}')">
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
                    {{-- Pagination Laravel dihapus --}}
                @else
                    <p class="text-muted">{{ __('admin.tidak_ada_materi') }}</p>
                @endif
            </div>
        </div>
    @else
        <div class="card border-0 shadow-sm" style="background-color: #f8f9fa;">
            <div class="card-body text-center">
                <p class="lead">{{ __('admin.belum_ada_materi') }}</p>
                <a href="{{ route('admin.materi.create') }}" class="btn btn-primary mt-2">{{ __('admin.add_materi') }}</a>
                <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-secondary mt-2">{{ __('admin.kelola_kategori') }}</a>
            </div>
        </div>
    @endif
</div>
@endsection