@extends('layouts.admin')
@section('title', 'Kelola Data Media Tanam')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">Kelola Data Media Tanam</h4>
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
                                            Media Tanam
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
                    <h4 class="card-title mb-0">Data Media Tanam</h4>

                    <a href="{{ route('admin.media-tanam.create') }}" class="btn btn-sm btn-primary">
                        <i class="ti ti-plus"></i> Tambah Data
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
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">#</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.media-tanam.edit', $item) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <a href="#" data-id="{{ $item->id }}"
                                           class="btn btn-sm btn-outline-primary delete-btn">
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
                <!--end: Card Body-->
            </div>
        </div>
    </div>
@endsection

@section('custom_html')
    <form action="#" method="post" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        let deleteBtns = document.querySelectorAll('.delete-btn');

        deleteBtns.forEach((btn) => {
            let id = btn.getAttribute('data-id');

            btn.addEventListener('click', function() {
                Swal.fire({
                    title: 'Hapus Data?',
                    text: "Yakin ingin menghapus data tanam? Tindakan ini tidak dapat dibatalkan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = document.querySelector('#delete-form');

                        form.setAttribute(`action`,
                            `{{ route('admin.media-tanam.destroy', false) }}/${id}`);
                        form.submit();
                    }
                })
            });
        });
    </script>
@endpush
