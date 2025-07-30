@extends('admin.layouts.app')

@section('title', __('admin.manajemen_survey'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.manajemen_survey') }}</h1>

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6>{{ __('admin.total_survey') }}</h6>
                    <span class="font-weight-bold">{{ $totalSurvey }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6>{{ __('admin.total_pretest') }}</h6>
                    <span class="font-weight-bold">{{ $totalPretest }}</span>
                </div>
            </div>
        </div>
         <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6>{{ __('admin.total_posttest') }}</h6>
                    <span class="font-weight-bold">{{ $totalPosttest }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h6 class="card-title">{{ __('admin.daftar_survey') }}</h6>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <a href="{{ route('admin.survey.pretest') }}" class="btn btn-secondary btn-lg w-100">
                        {{ __('admin.survey_pretest') }} <i class="fas fa-arrow-circle-right mr-2"></i>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.survey.posttest') }}" class="btn btn-secondary btn-lg w-100">
                        {{ __('admin.survey_posttest') }} <i class="fas fa-arrow-circle-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection