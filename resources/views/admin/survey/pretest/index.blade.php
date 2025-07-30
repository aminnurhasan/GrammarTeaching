{{-- resources/views/admin/kuis/pretest/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', __('admin.survey_pretest'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.survey_pretest') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.survey.index') }}" class="btn btn-secondary">{{ __('admin.kembali') }}</a>
                <a href="{{ route('admin.survey.pretest.create') }}" class="btn btn-primary">{{ __('admin.tambah_survey_pretest') }}</a>
            </div>

            <h6 class="card-title">{{ __('admin.daftar_survey') }}</h6>
            @if ($surveys->isNotEmpty())
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered rounded-md overflow-hidden">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">{{ __('admin.pertanyaan') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($surveys as $survey)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ Str::limit($survey->pertanyaan, 100) }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.survey.pretest.show', $survey->id) }}" class="btn btn-sm btn-info" title="{{ __('admin.lihat') }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.survey.pretest.edit', $survey->id) }}" class="btn btn-sm btn-warning" title="{{ __('admin.ubah') }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('admin.survey.pretest.destroy', $survey->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="{{ __('admin.hapus') }}" onclick="return confirm('{{ __('admin.konfirmasi_hapus_survey') }}')">
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
                {{-- Teks "tidak ada survey" akan ditampilkan di tengah dan sedikit lebih besar --}}
                <p class="text-muted text-center lead">{{ __('admin.tidak_ada_survey') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
