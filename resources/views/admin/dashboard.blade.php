@extends('layouts.admin')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card primary-gradient">
                <div class="card-body text-center px-9 pb-4">
                    <div class="d-flex align-items-center justify-content-center round-48 rounded text-bg-primary flex-shrink-0 mb-3 mx-auto">
                        <iconify-icon icon="solar:dollar-minimalistic-linear" class="fs-7 text-white"></iconify-icon>
                    </div>
                    <h6 class="fw-normal fs-3 mb-1">Kriteria</h6>
                    <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
                        {{ $count['kriteria'] }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card primary-gradient">
                <div class="card-body text-center px-9 pb-4">
                    <div class="d-flex align-items-center justify-content-center round-48 rounded text-bg-primary flex-shrink-0 mb-3 mx-auto">
                        <iconify-icon icon="solar:dollar-minimalistic-linear" class="fs-7 text-white"></iconify-icon>
                    </div>
                    <h6 class="fw-normal fs-3 mb-1">Alternatif</h6>
                    <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
                        {{ $count['alternatif'] }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card primary-gradient">
                <div class="card-body text-center px-9 pb-4">
                    <div class="d-flex align-items-center justify-content-center round-48 rounded text-bg-primary flex-shrink-0 mb-3 mx-auto">
                        <iconify-icon icon="solar:dollar-minimalistic-linear" class="fs-7 text-white"></iconify-icon>
                    </div>
                    <h6 class="fw-normal fs-3 mb-1">Tanaman</h6>
                    <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
                        {{ $count['tanaman'] }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection
