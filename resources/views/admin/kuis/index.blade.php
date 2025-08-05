@extends('admin.layouts.app')

@section('title', __('admin.manajemen_kuis'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.manajemen_kuis') }}</h1>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6>{{ __('admin.total_kuis') }}</h6>
                    <span class="font-weight-bold">{{ $totalKuis }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6>{{ __('admin.total_pilihan_ganda') }}</h6>
                    <span class="font-weight-bold">{{ $totalPilihanGanda }}</span>
                </div>
            </div>
        </div>
         <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6>{{ __('admin.total_susun_kata') }}</h6>
                    <span class="font-weight-bold">{{ $totalSusunKata }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h6 class="card-title">{{ __('admin.daftar_kuis') }}</h6>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <a href="{{ route('admin.kuis.pilihanGanda') }}" class="btn btn-secondary btn-lg w-100">
                        {{ __('admin.kuis_pilihan_ganda') }} <i class="fas fa-arrow-circle-right mr-2"></i>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.kuis.susunKata') }}" class="btn btn-secondary btn-lg w-100">
                        {{ __('admin.kuis_susun_kata') }} <i class="fas fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection