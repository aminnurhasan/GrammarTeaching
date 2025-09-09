@extends('user.layouts.app')

@section('title', __('user.posttest_survey_title'))

@section('content')
<div class="container my-4">
    <div class="card shadow-sm p-4">
        <h1 class="card-title fw-bold text-center mb-4">@lang('user.survey_posttest_title')</h1>
        <p class="text-center">@lang('user.survey_posttest_description')</p>
        <form action="{{ route('kuis.posttest.store') }}" method="POST">
            @csrf
            @foreach ($pertanyaanSurvey as $pertanyaan)
            <div class="card my-3 p-3 bg-light">
                <p class="fw-bold">{{ $loop->iteration }}. {{ $pertanyaan->pertanyaan }}</p>
                
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-center mt-2 gap-2">
                    <span class="text-muted text-center text-sm-start" style="flex-basis: 25%;">@lang('user.not_understood_at_all')</span>
                    
                    <div class="btn-group" role="group" aria-label="Survey rating">
                        @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" class="btn-check" name="survey[{{ $pertanyaan->id }}]" id="survey_{{ $pertanyaan->id }}_{{ $i }}" value="{{ $i }}" autocomplete="off" required>
                        <label class="btn btn-outline-primary" for="survey_{{ $pertanyaan->id }}_{{ $i }}">{{ $i }}</label>
                        @endfor
                    </div>
                    
                    <span class="text-muted text-center text-sm-end" style="flex-basis: 25%;">@lang('user.very_understood')</span>
                </div>
            </div>
            @endforeach
            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-lg">@lang('user.finish_button')</button>
            </div>
        </form>
    </div>
</div>
@endsection
