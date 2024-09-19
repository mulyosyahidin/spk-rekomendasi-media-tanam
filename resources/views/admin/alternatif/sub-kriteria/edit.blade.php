@extends('layouts.admin')
@section('title', 'Nilai Sub Kriteria')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">Nilai Sub Kriteria</h4>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex"
                                           href="{{ route('admin.dashboard') }}">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a class="text-muted text-decoration-none d-flex"
                                           href="{{ route('admin.alternatif.show', ['sistem_tanam' => $sistem_tanam, 'media_tanam' => $media_tanam]) }}">
                                            {{ $media_tanam->nama }} | {{ $sistem_tanam->nama }}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Nilai Sub Kriteria
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.alternatif.nilai-sub-kriteria', ['media_tanam' => $media_tanam, 'sistem_tanam' => $sistem_tanam, 'kriteria' => $kriteria]) }}" method="POST">
                @csrf

                <!--begin::Tables widget 14-->
                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom d-flex justify-content-between">
                        <h4 class="card-title mb-0">Nilai Sub Kriteria</h4>

                        <a href="{{ route('admin.alternatif.show', ['media_tanam' => $media_tanam, 'sistem_tanam' => $sistem_tanam]) }}" class="btn btn-sm btn-outline-primary">
                            <i class="ti ti-arrow-back"></i> Kembali
                        </a>
                    </div>
                    <!--begin::Body-->
                    <div class="card-body pt-6 border-top">
                        @foreach($kriteria->subKriteria as $subKriteria)
                           <div class="row">
                               <div class="col-md-6">
                                   <!--begin::Input group-->
                                   <div class="fv-row mb-7">
                                       <!--begin::Label-->
                                       <label class="form-label">
                                           <span>Sub Kriteria</span>
                                       </label>
                                       <!--end::Label-->
                                       <!--begin::Input-->
                                       <input type="text" name="nama" value="{{ $subKriteria->sub_kriteria }}"
                                              class="form-control" disabled>
                                       <!--end::Input-->
                                   </div>
                                   <!--end::Input group-->
                               </div>
                               <div class="col-md-6">
                                   <!--begin::Input group-->
                                   <div class="fv-row mb-7">
                                       <!--begin::Label-->
                                       <label class="form-label">
                                           <span>Bobot</span>
                                       </label>
                                       <!--end::Label-->
                                       <!--begin::Input-->
                                       <input type="text" name="bobot[{{ $subKriteria->id }}]" value="{{ $kriteria->nilaiSubKriteria()->where('id_sistem_tanam', $sistem_tanam->id)->where('id_media_tanam', $media_tanam->id)->where('id_kriteria', $kriteria->id)->where('id_sub_kriteria', $subKriteria->id)->first()?->bobot }}"
                                              class="form-control">
                                       <!--end::Input-->
                                   </div>
                                   <!--end::Input group-->
                               </div>
                           </div>
                        @endforeach
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
