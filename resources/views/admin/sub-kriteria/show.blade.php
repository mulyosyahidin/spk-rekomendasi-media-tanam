@extends('layouts.admin')
@section('title', 'Edit Data Sub Kriteria')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">Edit Data Sub Kriteria</h4>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex"
                                           href="{{ route('admin.dashboard') }}">
                                            <iconify-icon icon="solar:home-2-line-duotone"
                                                          class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                            <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                                Edit Sub Kriteria
                                            </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Tables widget 14-->
            <div class="card w-100 position-relative overflow-hidden">
                <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                    <h4 class="card-title mb-0">Sub Kriteria</h4>

                    <a href="{{ route('admin.kriteria.show', $kriterium) }}" class="btn btn-primary btn-sm">
                        <i class="ti ti-arrow-left"></i>
                        Kembali
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
                                <th class="text-black">#</th>
                                <th class="text-black">Pilihan</th>
                                <th class="text-black">Bobot</th>
                                <th class="text-black text-end">Hapus</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            @foreach ($kriterium->subKriteria as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($kriterium->tipe_input == 'Input Nilai')
                                            @if($item->operator == 1)
                                                {{ $item->nilai_a }} sampai {{ $item->nilai_b }}
                                            @elseif ($item->operator == 2)
                                                &gt; {{ $item->nilai_a }}
                                            @elseif ($item->operator == 3)
                                                &lt; {{ $item->nilai_a }}
                                            @elseif ($item->operator == 4)
                                                &gt;= {{ $item->nilai_a }}
                                            @elseif ($item->operator == 5)
                                                &lt;= {{ $item->nilai_a }}
                                            @endif
                                        @else
                                            {{ $item->nilai_a }}
                                        @endif
                                    </td>
                                    <td>{{ $item->bobot }}</td>
                                    <td class="text-end">
                                        <a href="#" data-id="{{ $item->id }}"
                                           class="btn btn-outline-danger btn-sm btn-delete-sub-kriteria">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </td>
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
            <!--end::Tables widget 14-->

            <form action="{{ route('admin.sub-kriteria.store', $kriterium) }}" method="POST">
                @csrf

                <!--begin::Tables widget 14-->
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom">
                        <h4 class="card-title mb-0">Nilai Sub Kriteria</h4>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body pt-6 border-top">
                        @if($kriterium->tipe_input == 'Input Nilai')
                            @include('admin.sub-kriteria.input.rentang-nilai')
                        @else
                            @include('admin.sub-kriteria.input.pilihan')
                        @endif
                    </div>
                    <!--end: Card Body-->
                    <!--begin::Footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="kt_forms_widget_14_submit_button">Simpan
                        </button>
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Tables widget 14-->
            </form>
        </div>
    </div>
@endsection

@section('custom_html')
    <form action="#" method="post" id="delete-sub-kriteria-form">
        @csrf
        @method('DELETE')

        <input type="hidden" name="id_sub_kriteria">
    </form>
@endsection

@push('custom_js')
    <script>
        let operator = document.querySelector('#operator');
        operator.addEventListener('change', function (e) {
            e.preventDefault();

            let value = operator.value;

            window.location = `{{ route('admin.sub-kriteria.show', $kriterium) }}?operator=${value}`;
        });
    </script>

    <script>
        let deleteSubKriteriaBtns = document.querySelectorAll('.btn-delete-sub-kriteria');
        let deleteSubKriteriaForm = document.querySelector('#delete-sub-kriteria-form');
        let idSubKriteria = deleteSubKriteriaForm.querySelector('input[name="id_sub_kriteria"]');

        deleteSubKriteriaBtns.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let id = btn.getAttribute('data-id');
                let deleteFormAction = `{{ route('admin.sub-kriteria.destroy', ['kriterium' =>  $kriterium]) }}`;

                deleteFormAction = deleteFormAction.replace(':idSubKriteria', id);

                deleteSubKriteriaForm.setAttribute('action', deleteFormAction);
                idSubKriteria.value = id;

                Swal.fire({
                    title: 'Hapus Data?',
                    text: "Yakin ingin menghapus data sub kriteria? Tindakan ini tidak dapat dibatalkan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteSubKriteriaForm.submit();
                    }
                })
            });
        });
    </script>
@endpush
