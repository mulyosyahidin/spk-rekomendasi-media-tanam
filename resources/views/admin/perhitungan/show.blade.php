@extends('layouts.admin')
@section('title', 'Perhitungan SPK MOORA')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">{{ $tanaman->nama }}</h4>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex"
                                           href="{{ route('admin.dashboard') }}">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            SPK MOORA
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-100 position-relative overflow-hidden">
                <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                    <h4 class="card-title mb-0">Data Tanaman</h4>

                    <a href="{{ route('admin.perhitungan.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="ti ti-arrow-back"></i> Kembali
                    </a>
                </div>

                <!--begin::Card body-->
                <div class="card-body p-4">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive mb-4 border rounded-1">
                        <table class="table text-nowrap mb-0 align-middle">
                            <tbody>
                            <tr class="even">
                                <td class="text-gray-600">Nama</td>
                                <td class="text-black">{{ $tanaman->nama }}</td>
                            </tr>
                            @foreach($tanaman->karakteristik as $item)
                                <tr class="{{ $loop->even ? 'even' : 'odd' }}">
                                    <td class="text-gray-600">{{ $item->nama }}</td>
                                    <td class="text-black">{{ $item->pivot->nilai }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Table wrapper-->
            </div>

            <div class="card w-100 position-relative overflow-hidden">
                <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                    <h4 class="card-title mb-0">Data Kriteria Alternatif</h4>
                </div>
                <!--begin::Body-->
                <div class="card-body p-4">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table
                            class="table table-row-dashed align-middle gs-0 gy-3 my-0 table-hover table-bordered dt-data" style="width: 100%;">
                            <!--begin::Table head-->
                            <thead class="text-dark fs-4">
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th rowspan="2" class="v-middle text-center">
                                    <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                </th>
                                <th rowspan="2" class="v-middle text-center">
                                    <h6 class="fs-4 fw-semibold mb-0">Alternatif</h6>
                                </th>
                                <th class="v-middle text-center" colspan="{{ $kriteria->count() }}">
                                    <h6 class="fs-4 fw-semibold mb-0">Kriteria</h6>
                                </th>
                            </tr>
                            <tr>
                                @foreach($kriteria as $item)
                                    <th class="text-center bg-dark-light text-white">
                                        <span class="cursor-pointer" data-bs-toggle="tooltip" data-bs-title="{{ $item->nama }}">
                                            C{{ $loop->iteration }}
                                        </span>
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            @foreach ($alternatif as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <span class="cursor-pointer" data-bs-toggle="tooltip" data-bs-title="{{ $item['media_tanam']['nama'] }} | {{ $item['sistem_tanam']['nama'] }}">
                                            {{ $item['kode'] }}
                                        </span>
                                    </td>
                                    @foreach($kriteria as $item)
                                        <td class="text-center"></td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end: Card Body-->
            </div>
        </div>
    </div>
@endsection
