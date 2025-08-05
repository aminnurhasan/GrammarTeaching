@extends('admin.layouts.app')

@section('title', __('admin.ubah_kuis_pilihan_ganda'))

@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.ubah_kuis_pilihan_ganda') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.kuis.pilihanGanda.update', $pilihanGanda) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="pertanyaan">{{ __('admin.pertanyaan') }} <span class="text-danger">*</span></label>
                    <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" id="pertanyaan" rows="5" required>{{ old('pertanyaan', $pilihanGanda->pertanyaan) }}</textarea>
                    @error('pertanyaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="opsi_a">{{ __('admin.opsi_a') }} <span class="text-danger">*</span></label>
                    <input type="text" name="opsi_a" class="form-control @error('opsi_a') is-invalid @enderror" id="opsi_a" value="{{ old('opsi_a', $pilihanGanda->opsi_a) }}" required>
                    @error('opsi_a')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="opsi_b">{{ __('admin.opsi_b') }} <span class="text-danger">*</span></label>
                    <input type="text" name="opsi_b" class="form-control @error('opsi_b') is-invalid @enderror" id="opsi_b" value="{{ old('opsi_b', $pilihanGanda->opsi_b) }}" required>
                    @error('opsi_b')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="opsi_c">{{ __('admin.opsi_c') }} <span class="text-danger">*</span></label>
                    <input type="text" name="opsi_c" class="form-control @error('opsi_c') is-invalid @enderror" id="opsi_c" value="{{ old('opsi_c', $pilihanGanda->opsi_c) }}" required>
                    @error('opsi_c')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="opsi_d">{{ __('admin.opsi_d') }} <span class="text-danger">*</span></label>
                    <input type="text" name="opsi_d" class="form-control @error('opsi_d') is-invalid @enderror" id="opsi_d" value="{{ old('opsi_d', $pilihanGanda->opsi_d) }}" required>
                    @error('opsi_d')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="jawaban_benar">{{ __('admin.jawaban_benar') }} <span class="text-danger">*</span></label>
                    <select name="jawaban_benar" class="form-select @error('jawaban_benar') is-invalid @enderror" id="jawaban_benar" required>
                        <option value="">{{ __('admin.pilih_jawaban_benar') }}</option>
                        {{-- Autoselect jawaban yang benar dan tampilkan teks opsi --}}
                        <option value="A" {{ old('jawaban_benar', $pilihanGanda->jawaban_benar) == 'a' ? 'selected' : '' }}>A - {{ Str::limit($pilihanGanda->opsi_a, 50) }}</option>
                        <option value="B" {{ old('jawaban_benar', $pilihanGanda->jawaban_benar) == 'b' ? 'selected' : '' }}>B - {{ Str::limit($pilihanGanda->opsi_b, 50) }}</option>
                        <option value="C" {{ old('jawaban_benar', $pilihanGanda->jawaban_benar) == 'c' ? 'selected' : '' }}>C - {{ Str::limit($pilihanGanda->opsi_c, 50) }}</option>
                        <option value="D" {{ old('jawaban_benar', $pilihanGanda->jawaban_benar) == 'd' ? 'selected' : '' }}>D - {{ Str::limit($pilihanGanda->opsi_d, 50) }}</option>
                    </select>
                    @error('jawaban_benar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="penjelasan">{{ __('admin.penjelasan') }}</label>
                    <textarea name="penjelasan" class="form-control @error('penjelasan') is-invalid @enderror" id="penjelasan" rows="5">{{ old('penjelasan', $pilihanGanda->penjelasan) }}</textarea>
                    @error('penjelasan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin.perbarui') }}</button>
                <a href="{{ route('admin.kuis.pilihanGanda') }}" class="btn btn-secondary">{{ __('admin.batal') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#pertanyaan',
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table fontfamily fontsize',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | fontfamily fontsize',
                menubar: 'view insert format table',
                font_formats: 'Andale Mono=andale mono,monospace;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino linotype,book antiqua,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times,serif;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                statusbar: false,
                menubar: false,
            });
            tinymce.init({
                selector: '#penjelasan',
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