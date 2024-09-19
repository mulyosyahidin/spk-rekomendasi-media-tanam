@extends('layouts.admin')
@section('title', 'Kriteria: '. $kriterium->nama)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">{{ $kriterium->nama }}</h4>
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
                                            Data Kriteria
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                            <h4 class="card-title mb-0">Data Kriteria</h4>

                            <a href="{{ route('admin.kriteria.index') }}" class="btn btn-sm btn-outline-primary">
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
                                        <td class="text-black">{{ $kriterium->nama }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="text-gray-600">Bobot</td>
                                        <td class="text-black">{{ $kriterium->bobot }}%</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="text-gray-600">Jenis</td>
                                        <td class="text-black">
                                            @if($kriterium->jenis == 'cost')
                                                <span class="badge bg-danger rounded-pill">COST</span>
                                            @else
                                                <span class="badge bg-success rounded-pill">BENEFIT</span>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Table wrapper-->
                        <!--begin::Card footer-->
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.kriteria.edit', $kriterium) }}" class="btn btn-primary btn-sm">
                                    <i class="ti ti-edit"></i>
                                    Edit
                                </a>
                                <button class="btn btn-danger btn-delete ms-2 btn-sm">
                                    <i class="ti ti-trash"></i>
                                    Hapus
                                </button>
                            </div>
                        </div>
                        <!--end::Card footer-->
                    </div>

                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                            <h4 class="card-title mb-0">Sub Kriteria</h4>

                            <a href="{{ route('admin.sub-kriteria.show', $kriterium) }}" class="btn btn-sm btn-primary">
                                <i class="ti ti-edit-circle"></i> Edit
                            </a>
                        </div>

                        <!--begin::Card body-->
                        <div class="card-body p-4">
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <table
                                    class="table table-row-dashed align-middle gs-0 gy-3 my-0 table-hover table-bordered dt-data"
                                    style="width: 100%;">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-black text-center" style="width: 10%;">#</th>
                                        <th class="text-black">Sub Kriteria</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    @foreach ($kriterium->subKriteria as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->sub_kriteria }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Table wrapper-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
    <form action="{{ route('admin.kriteria.destroy', $kriterium) }}" method="post" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        let btnDelete = document.querySelector('.btn-delete');

        btnDelete.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus Data?',
                text: "Yakin ingin menghapus data kriteria? Tindakan ini tidak dapat dibatalkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    let deleteForm = document.querySelector('#delete-form');

                    deleteForm.submit();
                }
            })
        });
    </script>
@endpush
