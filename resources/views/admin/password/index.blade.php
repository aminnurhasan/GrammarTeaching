@extends('admin.layouts.app')

@section('title', __('admin.password_change'))

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    {{ __('admin.password_change') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">{{ __('admin.current_password') }}</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" style="background-color: #e9ecef; border: 1px solid #ced4da;">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('admin.new_password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" style="background-color: #e9ecef; border: 1px solid #ced4da;">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('admin.confirm_new_password') }}</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" style="background-color: #e9ecef; border: 1px solid #ced4da;">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('admin.update_password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection