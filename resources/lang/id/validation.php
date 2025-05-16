<?php

return [
    'required' => ':attribute wajib diisi.',
    'string' => ':attribute harus berupa string.',
    'max' => [
        'numeric' => ':attribute tidak boleh lebih besar dari :max.',
        'file' => ':attribute tidak boleh lebih besar dari :max kilobyte.',
        'string' => ':attribute tidak boleh lebih besar dari :max karakter.',
        'array' => ':attribute tidak boleh memiliki lebih dari :max item.',
    ],
    'exists' => ':attribute yang dipilih tidak valid.',
    'integer' => ':attribute harus berupa bilangan bulat.',
];