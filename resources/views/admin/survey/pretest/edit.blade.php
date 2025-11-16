@extends('admin.layouts.app')

@section('title', __('admin.ubah_survey_pretest'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.ubah_survey') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.survey.pretest.update', $survey->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Penting untuk metode update --}}
                <div class="form-group mb-3">
                    <label for="pertanyaan">{{ __('admin.pertanyaan') }} <span class="text-danger">*</span></label>
                    <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" rows="5">{{ old('pertanyaan', $survey->pertanyaan) }}</textarea>
                    @error('pertanyaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="urutan">{{ __('admin.urutan') }}</label>
                    <input type="number" name="urutan" class="form-control @error('urutan') is-invalid @enderror" id="urutan" value="{{ old('urutan', $survey->urutan) }}" min="1">
                    @error('urutan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="jenis_survey">{{ __('admin.jenis_survey') }}</label>
                    <input type="text" name="jenis_survey" class="form-control @error('jenis_survey') is-invalid @enderror" id="jenis_survey" value="{{ old('jenis_survey', $survey->jenis_survey) }}" readonly>
                    @error('jenis_survey')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin.perbarui') }}</button>
                <a href="{{ route('admin.survey.pretest') }}" class="btn btn-secondary">{{ __('admin.batal') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#pertanyaan', // Menggunakan id 'pertanyaan' untuk TinyMCE
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table fontfamily fontsize',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | fontfamily fontsize',
                menubar: 'view insert format table',
                font_formats: 'Andale Mono=andale mono,monospace;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino linotype,book antiqua,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times,serif;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                statusbar: false,
                menubar: false,
            });
        });
    </script>
@endpush
