@extends('user.layouts.app')

@section('title', __('user.title'))

@section('content')
<section class="hero py-5 bg-light text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">{{ __('user.hero_title', ['name' => Auth::user()->nama]) }}</h1>
                <p class="lead">{{ __('user.hero_subtitle') }}</p>

                <a class="btn btn-primary btn-lg mt-3" href="{{route('kuis.pretest')}}" role="button">{{ __('user.start_quiz_button') }}</a>
            </div>
        </div>
    </div>
</section>

<section class="features py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <a class="card shadow-sm h-100 p-4 text-decoration-none">
                    <i class="fas fa-book fa-3x text-info"></i>
                    <h3 class="mt-3 text-dark">{{ __('user.learning_materials_title') }}</h3>
                    <p class="text-muted">{{ __('user.learning_materials_desc') }}</p>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a class="card shadow-sm h-100 p-4 text-decoration-none">
                    <i class="fas fa-history fa-3x text-warning"></i>
                    <h3 class="mt-3 text-dark">{{ __('user.quiz_history_title') }}</h3>
                    <p class="text-muted">{{ __('user.quiz_history_desc') }}</p>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a class="card shadow-sm h-100 p-4 text-decoration-none">
                    <i class="fas fa-user-circle fa-3x text-success"></i>
                    <h3 class="mt-3 text-dark">{{ __('user.my_account_title') }}</h3>
                    <p class="text-muted">{{ __('user.my_account_desc') }}</p>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
