@extends('admin.layouts.app')

@section('title', __('admin.kuis_pilihan_ganda'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.kuis_pilihan_ganda') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.kuis.index') }}" class="btn btn-secondary">{{ __('admin.kembali') }}</a>
                <a href="{{ route('admin.kuis.pilihanGanda.create') }}" class="btn btn-primary">{{ __('admin.tambah_kuis_pilihan_ganda') }}</a>
            </div>

            <h6 class="card-title">{{ __('admin.daftar_kuis_pilihan_ganda') }}</h6>
            @if ($soalPilihanGanda->isNotEmpty())
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered rounded-md overflow-hidden">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">{{ __('admin.pertanyaan') }}</th>
                                <th scope="col">{{ __('admin.jawaban_benar') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($soalPilihanGanda as $pilihanGanda) {{-- Variabel diubah dari $soal menjadi $pilihanGanda --}}
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{!! Str::limit(html_entity_decode($pilihanGanda->pertanyaan), 100, '...', true) !!}</td>
                                    <!-- <td>{{ $pilihanGanda->jawaban_benar }}</td> -->
                                    @php
                                        // Membuat nama properti dinamis (contoh: 'opsi_a')
                                        $correctAnswerKey = 'opsi_' . strtolower($pilihanGanda->jawaban_benar);
                                        $correctAnswerText = $pilihanGanda->$correctAnswerKey ?? '';
                                    @endphp
                                    <td>{{ Str::limit($correctAnswerText, 50) }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Menggunakan objek $pilihanGanda untuk Route Model Binding --}}
                                            <a href="{{ route('admin.kuis.pilihanGanda.show', $pilihanGanda) }}" class="btn btn-sm btn-info" title="{{ __('admin.lihat') }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.kuis.pilihanGanda.edit', $pilihanGanda) }}" class="btn btn-sm btn-warning" title="{{ __('admin.ubah') }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('admin.kuis.pilihanGanda.destroy', $pilihanGanda) }}" method="POST" class="d-inline">
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
                <p class="text-muted text-center lead">{{ __('admin.tidak_ada_kuis_pilihan_ganda') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
