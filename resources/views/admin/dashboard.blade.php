@extends('admin.layouts.app')

@section('title', __('admin.dashboard_title'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.dashboard_header') }}</h1>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <p class="lead">{{ __('admin.welcome_message', ['name' => Auth::user()->nama]) }}</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="bg-light text-secondary rounded-circle p-3 me-3" style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">{{ __('admin.total_users') }}</h6>
                            <!-- <span class="font-weight-bold">{{ $totalUsers ?? '...' }}</span> -->
                        </div>
                    </div>
                    <a href="#" class="btn btn-sm btn-outline-secondary mt-3">{{ __('admin.view_details') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                         <div class="bg-light text-secondary rounded-circle p-3 me-3" style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center;">
                            <i class="fas fa-book fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">{{ __('admin.total_materials') }}</h6>
                            <!-- <span class="font-weight-bold">{{ $totalMaterials ?? '...' }}</span> -->
                        </div>
                    </div>
                    <a href="#" class="btn btn-sm btn-outline-secondary mt-3">{{ __('admin.view_details') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                         <div class="bg-light text-secondary rounded-circle p-3 me-3" style="width: 50px; height: 50px; display: flex; justify-content: center; align-items: center;">
                            <i class="fas fa-question-circle fa-lg"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">{{ __('admin.total_quizzes') }}</h6>
                            <!-- <span class="font-weight-bold">{{ $totalQuizzes ?? '...' }}</span> -->
                        </div>
                    </div>
                    <a href="#" class="btn btn-sm btn-outline-secondary mt-3">{{ __('admin.view_details') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection