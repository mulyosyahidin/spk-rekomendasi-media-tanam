@extends('layouts.user')

@section('title', 'Dashboard User')

@section('content')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100 bg-light-primary border-0 overflow-hidden shadow-none rounded-3">
                <div class="card-body py-48">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-7">
                            <h2 class="fw-semibold mb-3">Selamat Datang, {{ $user->name }}!</h2>
                            <p class="mb-4">
                                Temukan rekomendasi media dan sistem tanam terbaik untuk tanaman Anda menggunakan Sistem Pendukung Keputusan kami.
                            </p>
                            <a href="{{ route('spk.index') }}" class="btn btn-primary px-4 py-2 rounded-pill">Mulai Perhitungan Baru</a>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <img src="{{ asset('assets/images/h1.png') }}" alt="" class="img-fluid" style="max-height: 150px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100 rounded-3">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Statistik Anda</h5>
                    <div class="mt-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <span class="round-48 d-flex align-items-center justify-content-center border border-primary rounded-circle text-primary">
                                <iconify-icon icon="solar:calculator-minimalistic-bold-duotone" width="24"></iconify-icon>
                            </span>
                            <div>
                                <h6 class="mb-0 fw-semibold">Total Perhitungan</h6>
                                <p class="mb-0 text-muted">{{ $totalCalculations }} Perhitungan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card rounded-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h5 class="card-title fw-semibold mb-0">Riwayat Perhitungan Terakhir</h5>
                        <a href="{{ route('spk.index') }}" class="btn btn-outline-primary btn-sm">Perhitungan Baru</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap align-middle mb-0">
                            <thead>
                                <tr class="text-muted fw-semibold">
                                    <th scope="col" class="ps-0">Nama Tanaman (Label)</th>
                                    <th scope="col">Tanaman Acuan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col" class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentCalculations as $calculation)
                                    <tr>
                                        <td class="ps-0">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <h6 class="fw-semibold mb-1">{{ $calculation->nama_tanaman }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 fs-3">{{ $calculation->tanaman ? $calculation->tanaman->nama : '-' }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 fs-3 text-muted">{{ $calculation->created_at->format('d M Y, H:i') }}</p>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('spk.hasil', $calculation) }}" class="btn btn-primary btn-sm rounded-pill">Lihat Hasil</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Belum ada riwayat perhitungan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
