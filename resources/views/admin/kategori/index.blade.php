@extends('admin.layouts.app')

@section('title', __('admin.kategori'))

@section('content')
<div class="container py-2">
    <h1 class="mb-4">{{ __('admin.kategori') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">{{ __('admin.add_kategori') }}</a>
            </div>

            <div class="table-responsive">
                <table id="tabel" class="table table-striped table-bordered rounded-md overflow-hidden">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">{{ __('admin.nama_kategori') }}</th>
                            <th scope="col">{{ __('admin.slug') }}</th>
                            <th scope="col" class="text-center">{{ __('admin.aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($kategoris as $index => $kategori)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $kategori->nama }}</td>
                                <td>{{ $kategori->slug }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.kategori.edit', $kategori) }}" class="btn btn-sm btn-warning" title="{{ __('admin.edit') }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('admin.kategori.destroy', $kategori) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="{{ __('admin.hapus') }}" onclick="return confirm('{{ __('admin.confirm_delete') }}')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection