@extends('layouts.admin')
@section('title', 'Perhitungan SPK MOORA')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">Perhitungan SPK MOORA</h4>
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

                    <a href="#"
                       class="btn btn-sm btn-outline-primary btn-reset">
                        Ulangi Semua Perhitungan <i class="ti ti-refresh"></i>
                    </a>
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
                                <th class="text-center" style="width: 10%;">
                                    <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            @foreach ($tanaman as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        @if($item->status_perhitungan)
                                            <span class="mb-1 badge rounded-pill  bg-success-subtle text-success">
                                                Sudah Dihitung
                                            </span>
                                        @else
                                            <span class="mb-1 badge rounded-pill  bg-danger-subtle text-danger">
                                                Belum Dihitung
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if($item->status_perhitungan)
                                            <a href="{{ route('admin.perhitungan.hasil', $item) }}"
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-arrow-right"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.perhitungan.show', $item) }}"
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="ti ti-arrow-right"></i>
                                            </a>
                                        @endif
                                    </td>
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
    <form action="{{ route('admin.perhitungan.reset-all') }}" method="post" id="reset-form">
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
                text: 'Yakin ingin mengulangi semua perhitungan? Setelah diulangi, semua data perhitungan akan dihapus.',
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
