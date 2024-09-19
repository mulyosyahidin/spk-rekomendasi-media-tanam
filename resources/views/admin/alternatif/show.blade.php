@extends('layouts.admin')
@section('title', 'Data Alternatif')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-body py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-sm-flex align-items-center justify-space-between">
                            <h4 class="mb-4 mb-md-0 card-title">Data Alternatif</h4>
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
                                            Data Alternatif
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
                            <h4 class="card-title mb-0">Data Alternatif</h4>

                            <a href="{{ route('admin.alternatif.index') }}" class="btn btn-sm btn-outline-primary">
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
                                        <td class="text-gray-600">Kode</td>
                                        <td class="text-black">{{ $kode }}</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="text-gray-600">Media Tanam</td>
                                        <td class="text-black">{{ $media_tanam->nama }}</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="text-gray-600">Sistem Tanam</td>
                                        <td class="text-black">{{ $sistem_tanam->nama }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Table wrapper-->
                    </div>

                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="px-4 py-3 border-bottom">
                            <h4 class="card-title mb-0">Nilai Sub Kriteria</h4>
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
                                        <th class="text-black text-center" rowspan="2" style="vertical-align: middle;">
                                            #
                                        </th>
                                        <th class="text-black" rowspan="2" style="vertical-align: middle;">Kriteria</th>
                                        <th class="text-black text-center" colspan="4">Bobot</th>
                                        <th rowspan="2"></th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">4</th>
                                        <th class="text-center">3</th>
                                        <th class="text-center">2</th>
                                        <th class="text-center">1</th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    @foreach($kriteria as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td class="text-center">
                                                @if($nilai = $item->nilaiSubKriteria()->where('id_sistem_tanam', $sistem_tanam->id)->where('id_media_tanam', $media_tanam->id)->where('id_kriteria', $item->id)->where('bobot', 4)->first())
                                                    {{ $nilai->subKriteria->sub_kriteria }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($nilai = $item->nilaiSubKriteria()->where('id_sistem_tanam', $sistem_tanam->id)->where('id_media_tanam', $media_tanam->id)->where('id_kriteria', $item->id)->where('bobot', 3)->first())
                                                    {{ $nilai->subKriteria->sub_kriteria }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($nilai = $item->nilaiSubKriteria()->where('id_sistem_tanam', $sistem_tanam->id)->where('id_media_tanam', $media_tanam->id)->where('id_kriteria', $item->id)->where('bobot', 2)->first())
                                                    {{ $nilai->subKriteria->sub_kriteria }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($nilai = $item->nilaiSubKriteria()->where('id_sistem_tanam', $sistem_tanam->id)->where('id_media_tanam', $media_tanam->id)->where('id_kriteria', $item->id)->where('bobot', 1)->first())
                                                    {{ $nilai->subKriteria->sub_kriteria }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.alternatif.nilai-sub-kriteria', ['media_tanam' => $media_tanam, 'sistem_tanam' => $sistem_tanam, 'kriteria' => $item]) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="ti ti-edit"></i>
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
                </div>
            </div>
        </div>
    </div>
@endsection

