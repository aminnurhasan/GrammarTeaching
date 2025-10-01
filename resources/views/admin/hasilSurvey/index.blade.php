@extends('admin.layouts.app')

@section('title', __('admin.hasil_pengerjaan_survey'))

@section('content')

<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.hasil_pengerjaan_survey') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="card-title mb-0">{{ __('admin.daftar_hasil_survey_peserta') }}</h6>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left me-1"></i> {{ __('admin.kembali_ke_dashboard') }}
                </a>
            </div>

            @if ($participants->isNotEmpty()) 
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered rounded-md overflow-hidden align-middle">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">{{ __('admin.nama_siswa') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.status_pretest') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.status_posttest') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($participants as $hasilKuis)
                                @php
                                    $userId = $hasilKuis->user_id;
                                    // Status diambil dari controller HasilSurveyController@index
                                    $isSurvey1Done = $usersWithSurvey1->contains($userId);
                                    $isSurvey2Done = $usersWithSurvey2->contains($userId);
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $hasilKuis->user->nama ?? __('admin.pengguna_dihapus') }}</div>
                                        <small class="text-muted">{{ $hasilKuis->user->email ?? '-' }}</small>
                                    </td>
                                    <td class="text-center">
                                        @if($isSurvey1Done)
                                            <span class="badge bg-success">{{ __('admin.selesai') }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark">{{ __('admin.belum') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($isSurvey2Done)
                                            <span class="badge bg-success">{{ __('admin.selesai') }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark">{{ __('admin.belum') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ $isSurvey1Done ? route('admin.hasilSurvey.show_survey_result', ['userId' => $userId, 'type' => 'pre']) : '#' }}" 
                                                class="btn btn-sm btn-info @unless($isSurvey1Done) disabled @endunless" 
                                                title="{{ __('admin.detail_pretest') }}">
                                                <i class="fas fa-eye me-1"></i> {{ __('admin.lihat_detail') }}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted text-center lead">{{ __('admin.belum_ada_hasil_survey_yang_selesai') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
