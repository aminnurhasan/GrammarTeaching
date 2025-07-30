@extends('admin.layouts.app')

@section('title', __('admin.detail_survey_posttest'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.detail_survey_posttest') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="mb-3">
                <label for="pertanyaan" class="form-label font-weight-bold">{{ __('admin.pertanyaan') }}:</label>
                <div class="border p-2 rounded bg-light">
                    {!! $survey->pertanyaan !!}
                </div>
            </div>
            <div class="mb-3">
                <label for="urutan" class="form-label font-weight-bold">{{ __('admin.urutan') }}:</label>
                <div class="border p-2 rounded bg-light">
                    {{$survey->urutan}}
                </div>
            </div>
            <div class="mb-3">
                <label for="jenis_survey" class="form-label font-weight-bold">{{ __('admin.jenis_survey') }}:</label>
                <div class="border p-2 rounded bg-light">
                    {{$survey->jenis_survey}}
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.survey.posttest') }}" class="btn btn-secondary">{{ __('admin.kembali') }}</a>
                <a href="{{ route('admin.survey.posttest.edit', $survey->id) }}" class="btn btn-warning">{{ __('admin.edit') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
