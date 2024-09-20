@extends('layouts.admin')
@section('title', 'Pemeringkatan')

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
                    <h4 class="card-title mb-0">Pemeringkatan</h4>

                    <div>
                        @if($tanaman->status_perhitungan)
                            <a href="{{ route('admin.perhitungan.matrix-optimalisasi', $tanaman) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>

                            <a href="{{ route('admin.perhitungan.hasil', $tanaman) }}"
                               class="btn btn-sm btn-outline-primary">
                                Lihat Hasil <i class="ti ti-arrow-right"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.perhitungan.matrix-optimalisasi', $tanaman) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>

                            <a href="#" class="btn btn-sm btn-outline-primary btn-save">
                                Simpan Hasil <i class="ti ti-check"></i>
                            </a>
                        @endif
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
                                    <h6 class="fs-4 fw-semibold mb-0">Alternatif</h6>
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
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <span class="cursor-pointer" data-bs-toggle="tooltip"
                                              data-bs-title="{{ $item['media_tanam']['nama'] }} | {{ $item['sistem_tanam']['nama'] }}">
                                            {{ $item['kode'] }}
                                            </span>
                                    </td>
                                    <td class="text-center">{{ $item['nilai'] }}</td>
                                    <td class="text-center">{{ $item['peringkat'] }}</td>
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
    <form action="{{ route('admin.perhitungan.simpan', $tanaman) }}" method="post" id="save-form">
        @csrf
    </form>
@endsection

@push('custom_js')
    <script>
        let btnSave = document.querySelector('.btn-save');
        let saveForm = document.querySelector('#save-form');

        btnSave.addEventListener('click', (e) => {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda yakin ingin menyimpan hasil perhitungan ini? Setelah dihitung, data tanaman ini tidak dapat dihitung lagi.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    saveForm.submit();
                }
            });
        });
    </script>
@endpush
