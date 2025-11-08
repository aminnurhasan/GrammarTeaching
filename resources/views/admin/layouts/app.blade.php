<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('welcome.title'))</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" xintegrity="sha512-ieoUv6T+N2s9yWfQxQeL2h7x6s7hE7S7uC/qf3tN3G4C7w9b1q4I9L3e+h9oVpP7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            padding-top: 15px;
            background-color: #ffffff;
            flex-grow: 1;
            padding-left: 20px;
            padding-right: 20px;
        }

        footer {
            background-color: #212529;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .hero {
            background-color: #e9ecef;
            padding: 80px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #007bff;
        }
        .hero p {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .features {
            padding: 60px 0;
            background-color: #fff;
        }
        .feature-item {
            text-align: center;
            padding: 30px;
        }
        .feature-item i {
            font-size: 2.5rem;
            color: #28a745;
            margin-bottom: 15px;
        }
        .feature-item h3 {
            font-size: 1.75rem;
            margin-bottom: 10px;
        }

        #tabel {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            margin-bottom: 1rem;
            background-color: #fff;
            color: #212529;
        }

        #tabel thead {
            background-color: #343a40;
            color: #fff;
        }

        #tabel thead th {
            padding: 0.75rem;
            vertical-align: bottom;
            border-bottom: 2px solid #495057;
            text-align: left;
            font-weight: bold;
        }

        #tabel tbody tr {
            transition: background-color 0.3s ease;
        }

        #tabel tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        #tabel tbody td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        #tabel tbody tr:last-child td {
            border-bottom: none;
        }

        .dataTables_wrapper .dataTables_info {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            color: #212529;
        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.375rem 0.75rem;
            margin: 0 0.25rem;
            border-radius: 0.25rem;
            border: 1px solid #dee2e6;
            background-color: #fff;
            color: #212529;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #e9ecef;
            color: #212529;
            border-color: #dee2e6;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            color: #6c757d;
            cursor: not-allowed;
            background-color: transparent;
            border-color: #dee2e6;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.25rem;
            border: 1px solid #dee2e6;
            padding: 0.375rem 0.75rem;
            transition: border-color 0.15s ease-in-out, shadow-box 0.15s ease-in-out;
            width: 200px;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            outline: 0;
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 0.25rem;
            border: 1px solid #dee2e6;
            padding: 0.375rem 0.75rem;
            transition: border-color 0.15s ease-in-out, shadow-box 0.15s ease-in-out;
            width: auto;
        }

        .dataTables_wrapper .dataTables_length select:focus {
            outline: 0;
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-group .btn {
            margin: 0;
        }

        .mt-4 table {
            /* Set lebar tabel agar responsif */
            width: 100%; 
            /* Atur border ke mode 'collapse' agar border sel menyatu */
            border-collapse: collapse; 
            /* Spasi di dalam sel */
            margin: 20px 0; 
            /* Pastikan border tabel utama ada */
            border: 2px solid #000000ff;
        }

        .mt-4 th, 
        .mt-4 td {
            /* Padding di dalam header dan sel */
            padding: 12px; 
            /* Border untuk setiap sel (garis internal) */
            border: 2px solid #000000ff; 
            /* Teks rata kiri */
            text-align: left; 
        }

        .mt-4 th {
            /* Styling khusus untuk header tabel */
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        /* Optional: Garis zebra untuk keterbacaan yang lebih baik */
        .mt-4 tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div id="app" class="d-flex flex-column min-vh-100" style="background-color:rgb(227, 227, 227);">
        @include('admin.layouts.navbar')

        <main class="flex-grow-1 py-3 px-4"  style="background-color:rgb(227, 227, 227);">
            @yield('content')
        </main>

        @include('admin.layouts.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#konten',
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table fontfamily fontsize',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | fontfamily fontsize',
                menubar: 'view insert format table',
                font_formats: 'Andale Mono=andale mono,monospace;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino linotype,book antiqua,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times,serif;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                statusbar: false,
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            tinymce.init({
                selector: '#penjelasan',
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table fontfamily fontsize',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | fontfamily fontsize',
                menubar: 'view insert format table',
                font_formats: 'Andale Mono=andale mono,monospace;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino linotype,book antiqua,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times,serif;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                statusbar: false,
                height: 200,
            });
        });
    </script>
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
                height: 200,
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tabel').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                },
                pageLength: 10,
                lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Semua"] ],
                pagingType: "numbers",
                dom: 'Blfrtip',
                buttons: [
                    { extend: 'copy', className: 'btn-sm btn-secondary' },
                    { extend: 'csv', className: 'btn-sm btn-secondary' },
                    { extend: 'excel', className: 'btn-sm btn-secondary' },
                    { extend: 'pdf', className: 'btn-sm btn-secondary' },
                    { extend: 'print', className: 'btn-sm btn-secondary' },
                ],
                initComplete: function () {
                    $('.dataTables_filter input').addClass('form-control form-control-sm');
                    $('.dataTables_length select').addClass('form-select form-select-sm');
                }
            });
        });
    </script>
</body>
</html>