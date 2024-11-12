@extends('layouts.admin')
@section('title', 'Hasil Perhitungan SPK MOORA')

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
                                    <td class="text-black">{{ $tanaman->nilai($item->pivot->id_kriteria) }}</td>
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
                    <h4 class="card-title mb-0">Hasil Pemeringkatan</h4>

                    <div>
                        <a href="#"
                           class="btn btn-sm btn-outline-primary btn-reset">
                            Ulangi Perhitungan <i class="ti ti-refresh"></i>
                        </a>
                        <a href="{{ route('admin.perhitungan.matrix-keputusan', $tanaman) }}"
                           class="btn btn-sm btn-outline-primary">
                            Lihat Perhitungan <i class="ti ti-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <!--begin::Body-->
                <div class="card-body p-4">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table
                            class="table table-row-dashed align-middle gs-0 gy-3 my-0 table-hover table-bordered dt-data"
                            style="width: 100%;">
                            <!--begin::Table head-->
                            <thead class="text-dark fs-4">
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="v-middle text-center">
                                    <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                </th>
                                <th class="v-middle text-center">
                                    <h6 class="fs-4 fw-semibold mb-0">Kode Alternatif</h6>
                                </th>
                                <th class="v-middle text-center">
                                    <h6 class="fs-4 fw-semibold mb-0">Media Tanam</h6>
                                </th>
                                <th class="v-middle text-center">
                                    <h6 class="fs-4 fw-semibold mb-0">Sistem Tanam</h6>
                                </th>
                                <th class="v-middle text-center">
                                    <h6 class="fs-4 fw-semibold mb-0">Total Nilai</h6>
                                </th>
                                <th class="v-middle text-center">
                                    <h6 class="fs-4 fw-semibold mb-0">Peringkat</h6>
                                </th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            @foreach ($tanaman->hasilPerhitungan as $hasilPerhitungan)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $hasilPerhitungan->kode_alternatif }}</td>
                                    <td class="text-center">{{ $hasilPerhitungan->mediaTanam->nama }}</td>
                                    <td class="text-center">{{ $hasilPerhitungan->sistemTanam->nama }}</td>
                                    <td class="text-center">{{ $hasilPerhitungan->nilai }}</td>
                                    <td class="text-center">{{ $hasilPerhitungan->peringkat }}</td>
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

@section('custom_html')
    <form action="{{ route('admin.perhitungan.reset', $tanaman) }}" method="post" id="reset-form">
        @csrf
    </form>
@endsection

@push('custom_js')
    <script>
        let resetBtn = document.querySelector('.btn-reset');
        resetBtn.addEventListener('click', function (e) {
            e.preventDefault();

            let resetForm = document.querySelector('#reset-form');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan mengulangi perhitungan SPK MOORA!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ulangi!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    resetForm.submit();
                }
            });
        });
    </script>
@endpush
