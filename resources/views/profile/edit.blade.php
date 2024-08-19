@extends('layouts.'. $role)
@section('title', auth()->user()->name . ' - Profile')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">Edit Profil</h4>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Edit Profil
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!--begin::Tables widget 14-->
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h4 class="card-title mb-0">Edit Profil Saya</h4>
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
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                   class="form-control @error('name') is-invalid @enderror" required>
                            <!--end::Input-->

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <div class="row">
                            <div class="col-6">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="form-label">
                                        <span>Email</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                           class="form-control @error('email') is-invalid @enderror" required>
                                    <!--end::Input-->

                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="col-6">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="form-label">
                                        <span>Password</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror">
                                    <!--end::Input-->

                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="form-label">
                                <span>Foto Profil</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" name="profile_picture"
                                   class="form-control @error('profile_picture') is-invalid @enderror">
                            <!--end::Input-->

                            <small class="text-muted">Pilih foto yang baru untuk mengganti yang lama.</small>

                            @error('profile_picture')
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
