<div class="row">
    <div class="col-12 col-md-6">
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="form-label">
                <span>Operator</span>
            </label>
            <!--end::Label-->
            <div class="input-group">
                <select name="operator" id="operator" class="form-control">
                    <option selected="" disabled="">Pilih Operator</option>
                    <option value="1" {{ request()->get('operator') == '1' ? 'selected' : '' }}>Rentang Nilai
                    </option>
                    <option value="2" {{ request()->get('operator') == '2' ? 'selected' : '' }}>Lebih dari (&gt;)
                    </option>
                    <option value="3" {{ request()->get('operator') == '3' ? 'selected' : '' }}>Kecil dari (&lt;)
                    </option>
                    <option value="4" {{ request()->get('operator') == '4' ? 'selected' : '' }}>Lebih besar atau
                        sama dengan (&gt;=)
                    </option>
                    <option value="5" {{ request()->get('operator') == '5' ? 'selected' : '' }}>Lebih kecil atau
                        sama dengan (&lt;=)
                    </option>
                </select>
            </div>
        </div>
        <!--end::Input group-->
    </div>
    <div class="col-12 col-md-6">
        <!--begin::Input group-->
        <div class="fv-row mb-7 input">
            <!--begin::Label-->
            <label class="form-label">
                <span>Bobot</span>
            </label>
            <!--end::Label-->
            <div class="input-group">
                <!--begin::Input-->
                <input type="text" name="bobot" value="{{ old('bobot') }}"
                       class="form-control @error('bobot') is-invalid @enderror" required>
                <!--end::Input-->
            </div>

            @error('bobot')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!--end::Input group-->
    </div>
</div>

@if(request()->get('operator') == 1)
    <div class="row">
        <div class="col-12 col-md-6">
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="form-label">
                    <span>Nilai Minimal</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="nilai_a" value="{{ old('nilai_a') }}"
                       class="form-control @error('nilai_a') is-invalid @enderror" required>
                <!--end::Input-->

                @error('nilai_a')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!--end::Input group-->
        </div>
        <div class="col-12 col-md-6">
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="form-label">
                    <span>Nilai Maksimal</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="nilai_b" value="{{ old('nilai_b') }}"
                       class="form-control @error('nilai_b') is-invalid @enderror" required>
                <!--end::Input-->

                @error('nilai_b')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!--end::Input group-->
        </div>
    </div>
@else
    <!--begin::Input group-->
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="form-label">
            <span>Nilai</span>
        </label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="text" name="nilai_a" value="{{ old('nilai_a') }}"
               class="form-control @error('nilai_a') is-invalid @enderror" required>
        <!--end::Input-->

        @error('nilai_a')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <!--end::Input group-->
@endif
