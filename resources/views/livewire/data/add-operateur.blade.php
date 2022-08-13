<form class="form" wire:submit.prevent="save">
    <div class="modal-header" id="kt_modal_new_address_header">
        <h2>Ajouter un Operateur</h2>
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
            <span class="svg-icon svg-icon-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)"
                        fill="currentColor" />
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                        fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>
    <div class="modal-body py-10 px-lg-17">
        <!--begin::Scroll-->
        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_new_address_header"
            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
            <div class="row mb-5">
                <div class="col-md-4 fv-row">
                    <label class="required fs-5 fw-bold mb-2">Code</label>
                    <input type="text" wire:model='code' class="form-control form-control-solid" placeholder=""
                        name="code ..." />
                        @error('code')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                </div>
                <div class="col-md-4 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nommination</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text" wire:model='nomOperateur' class="form-control form-control-solid" placeholder=""
                        name="nommination" />
                    <!--end::Input-->
                    @error('nomOperateur')
                    <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <!--end::Col-->
            </div>
        </div>
        <!--end::Scroll-->
    </div>
    <!--end::Modal body-->
    <!--begin::Modal footer-->
    <div class="modal-footer flex-center">
        <!--begin::Button-->
        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Annuler</button>
        <!--end::Button-->
        <!--begin::Button-->
        <button class="btn btn-primary">
            <span class="indicator-label">
                Save
            </span>
            <span class="indicator-progress">
                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
        <!--end::Button-->
    </div>
    <!--end::Modal footer-->
</form>

