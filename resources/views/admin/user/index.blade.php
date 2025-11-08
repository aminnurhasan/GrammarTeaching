@extends('admin.layouts.app')

@section('title', __('admin.page_title'))

@section('content')

<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.data_siswa') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">{{ __('admin.kembali') }}</a>
            </div>

            <h6 class="card-title">{{ __('admin.daftar_siswa') }}</h6>

            @if ($students->isNotEmpty())
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered rounded-md overflow-hidden">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th scope="col" class="text-center">{{ __('admin.no') }}</th>
                                <th scope="col">{{ __('admin.nama_siswa') }}</th>
                                <th scope="col">{{ __('admin.sekolah') }}</th>
                                <th scope="col">{{ __('admin.email') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($students as $student)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $student->nama }}</td>
                                    <td>{{ $student->sekolah }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.user.show', $student) }}"
                                               class="btn btn-sm btn-info"
                                               title="{{ __('admin.lihat_detail') }}">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('admin.user.edit', $student) }}"
                                               class="btn btn-sm btn-warning"
                                               title="{{ __('admin.ubah_data') }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <form action="{{ route('admin.user.destroy', $student) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        title="{{ __('admin.hapus_pengguna') }}"
                                                        onclick="return confirm('{{ __('admin.hapus_konfirmasi', ['nama' => $student->nama]) }}')">
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

                <div class="d-flex justify-content-center">
                    {{ $students->links() }}
                </div>
            @else
                <p class="text-muted text-center lead">{{ __('admin.tidak_ada_data') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection