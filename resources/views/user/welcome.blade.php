@extends('user.layouts.app')

@section('title', __('welcome.title'))

@section('content')
<section class="hero py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold">{{ __('welcome.hero_title') }}</h1>
                <p class="lead">{{ __('welcome.hero_subtitle') }}</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">{{ __('welcome.hero_button_quiz') }}</a>
            </div>
        </div>
    </div>
</section>

<section class="features py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <i class="fas fa-book fa-3x text-info"></i>
                <h3 class="mt-3">{{ __('welcome.feature_materi_title') }}</h3>
                <p>{{ __('welcome.feature_materi_desc') }}</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-question-circle fa-3x text-success"></i>
                <h3 class="mt-3">{{ __('welcome.feature_kuis_title') }}</h3>
                <p>{{ __('welcome.feature_kuis_desc') }}</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-language fa-3x text-warning"></i>
                <h3 class="mt-3">{{ __('welcome.feature_bahasa_title') }}</h3>
                <p>{{ __('welcome.feature_bahasa_desc') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection