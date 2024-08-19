<div class="row">
    <div class="col-12 col-md-6">
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="form-label">Pilihan</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="nilai[0][pilihan]" value="{{ old('nilai.0.pilihan') }}"
                   class="form-control @error('nilai.0.pilihan') is-invalid @enderror" required>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
    </div>
    <div class="col-12 col-md-6">
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="form-label">Nilai Bobot</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="nilai[0][bobot]" value="{{ old('nilai.0.bobot') }}"
                   class="form-control @error('nilai.0.bobot') is-invalid @enderror" required>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
    </div>
</div>
