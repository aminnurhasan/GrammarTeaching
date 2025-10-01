@extends('admin.layouts.app')

@section('title', __('admin.hasil_pengerjaan_kuis'))

@section('content')

<div class="container py-5">
    <h1 class="mb-4">{{ __('admin.hasil_pengerjaan_kuis') }}</h1>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                {{-- Tombol kembali opsional, sesuaikan rute jika perlu --}}
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">{{ __('admin.kembali_ke_dashboard') }}</a>
            </div>

            <h6 class="card-title">{{ __('admin.daftar_semua_hasil_kuis') }}</h6>
            
            {{-- Variabel yang digunakan di sini adalah $semuaHasilKuis dari controller --}}
            @if ($semuaHasilKuis->isNotEmpty()) 
                <div class="table-responsive">
                    <table id="tabel" class="table table-striped table-bordered rounded-md overflow-hidden">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">{{ __('admin.nama_siswa') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.nilai_pilihan_ganda') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.nilai_acak_kata') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.waktu_selesai') }}</th>
                                <th scope="col" class="text-center">{{ __('admin.aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($semuaHasilKuis as $hasilKuis)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    {{-- Menggunakan relasi user untuk menampilkan nama siswa --}}
                                    <td>{{ $hasilKuis->user->nama ?? 'Pengguna Dihapus' }}</td>
                                    <td class="text-center">{{ $hasilKuis->skor_pilihan_ganda }}</td>
                                    <td class="text-center">{{ $hasilKuis->skor_acak_kata }}</td>
                                    <td class="text-center">{{ $hasilKuis->created_at->format('d M Y H:i') }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            {{-- Route untuk melihat detail hasil kuis spesifik --}}
                                            <a href="{{ route('admin.hasilKuis.show', $hasilKuis) }}" class="btn btn-sm btn-info" title="{{ __('admin.lihat_detail') }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            {{-- Tambahkan form hapus jika diperlukan (dihilangkan untuk menjaga kesederhanaan) --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted text-center lead">{{ __('admin.belum_ada_hasil_kuis') }}</p>
            @endif
        </div>
    </div>

</div>
@endsection