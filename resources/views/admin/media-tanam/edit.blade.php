@extends('layouts.admin')
@section('title', 'Edit Data Media Tanam')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.media-tanam.update', $media_tanam) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-sm-flex align-items-center justify-space-between">
                                <h4 class="mb-4 mb-md-0 card-title">Edit Data Media Tanam</h4>
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
                                                Edit Media Tanam
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
                        <h4 class="card-title mb-0">Edit Data Media Tanam</h4>

                        <a href="{{ route('admin.media-tanam.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="ti ti-arrow-back"></i> Kembali
                        </a>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body pt-6 border-top">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="form-label">
                                <span>Nama</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="nama" value="{{ old('nama', $media_tanam->nama) }}"
                                   class="form-control @error('nama') is-invalid @enderror" required>
                            <!--end::Input-->

                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="form-label">
                                <span>Foto</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" name="foto"
                                   class="form-control @error('foto') is-invalid @enderror">
                            <!--end::Input-->

                            <small class="text-muted">Pilih foto baru untuk mengganti yang lama</small>

                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="form-label">
                                <span>Deskripsi</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="deskripsi"
                                      class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $media_tanam->deskripsi) }}</textarea>
                            <!--end::Input-->

                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input group-->
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
