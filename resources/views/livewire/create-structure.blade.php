<form class="form" id="kt_modal_new_target_form" wire:submit.prevent="save" >
    <div class="modal-header" id="kt_modal_new_address_header">
        <h2>Ajouter Nouvelle Structure</h2>
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
                <div class="col-md-6 fv-row">
                    <label class="required fs-5 fw-bold mb-2">Code</label>
                    <input type="text" wire:model='codeStructure' class="form-control form-control-solid" placeholder=""
                        name="code" />
                </div>
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nommination</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text" wire:model='designation' class="form-control form-control-solid" placeholder=""
                        name="designation" />
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <div class="row mb-5">
                <label class="required fs-5 fw-bold mb-2">Adresse</label>
                <div class="col-md-6 fv-row">
                    <select name="province" wire:model='selectedProvince' data-placeholder="Select Provinces..."
                        class="form-select">
                        <option value="">Select a Country...</option>
                        @foreach ($provinces as $province)
                        <option value="{{$province->id}}">{{$province->designation}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 fv-row">
                    <select name="territoire" wire:model='selectedCity' data-placeholder="Select Ville/Territoires ...."
                        class="form-select">
                        <option value="">Select a Ville...</option>
                        @foreach ($territoires as $territoire)
                        <option value="{{$territoire->id}}">{{$territoire->designation}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 fv-row">
                    <select name="commune" wire:model='selectedCommune'
                        data-placeholder="Select Communes/Secteurs/Chefferies..." class="form-select">
                        <option value="">Select a Commune...</option>
                        @foreach ($communes as $commune)
                        <option value="{{$commune->id}}">{{$commune->designation}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 fv-row">
                    <select name="quartier" wire:model='selectedQuartier' data-placeholder="Select Quartier/Village..."
                        class="form-select">
                        <option value="">Select a Country...</option>
                        @foreach ($quartiers as $quartier)
                        <option value="{{$quartier->id}}">{{$quartier->designation}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row g-9 mb-5">
                <div class="col-md-6 fv-row">
                    <label class="fs-5 fw-bold mb-2">Avenue</label>
                    <input class="form-control form-control-solid" wire:model='avenu' placeholder="" name="avenue" />
                </div>
                <div class="col-md-6 fv-row">
                    <label class="fs-5 fw-bold mb-2">Code Parcelle</label>
                    <input class="form-control form-control-solid" wire:model='numParcelle' placeholder=""
                        name="numParcelle" />
                </div>
            </div>

            <div class="row g-9 mb-5">
                <label class="fs-5 fw-bold mb-2">Coordonnees Geographique</label>
                <div class="col-md-6 fv-row">
                    <label class="fs-5 fw-bold mb-2">Longitude</label>
                    <input class="form-control form-control-solid" wire:model='long' placeholder="" name="long" />
                </div>
                <div class="col-md-6 fv-row">
                    <label class="fs-5 fw-bold mb-2">Latitude</label>
                    <input class="form-control form-control-solid" wire:model='lat' placeholder="" name="lat" />
                </div>
            </div>
            <div class="row g-9 mb-5">
                <label class="fs-5 fw-bold mb-2">Contact Telephoniques</label>
                <div class="col-md-6 fv-row">
                    <label class="fs-5 fw-bold mb-2">Numero 1</label>
                    <input class="form-control form-control-solid" wire:model='numTel1' placeholder="" name="tel1" />
                </div>
                <div class="col-md-6 fv-row">
                    <label class="fs-5 fw-bold mb-2">Numero 2</label>
                    <input class="form-control form-control-solid" wire:model='numTel2' placeholder="" name="tel2" />
                </div>
            </div>

            <div class="row g-9 mb-5">
                <div class="col-md-12 fv-row">
                    <label class="fs-5 fw-bold mb-2">Email</label>
                    <input class="form-control form-control-solid" wire:model='email' placeholder="" name="email" />
                </div>
            </div>
            <div class="row g-9 mb-5">
                <div class="col-md-12 fv-row">
                    <label class="fs-5 fw-bold mb-2">Web Site</label>
                    <input class="form-control form-control-solid" wire:model='siteWeb' placeholder="" name="website" />
                </div>
            </div>
            <div class="row g-9 mb-5">
                <label class="fs-5 fw-bold mb-2">Indentification</label>
                <div class="col-md-6 fv-row">
                    <input class="form-control form-control-solid" wire:model='rccm' placeholder="RCCM" name="rccm" />
                </div>
                <div class="col-md-6 fv-row">
                    <input class="form-control form-control-solid" wire:model='numImpot' placeholder="N°Impot"
                        name="num_impot" />
                </div>
                <div class="col-md-6 fv-row">
                    <input class="form-control form-control-solid" wire:model='idNational' placeholder="ID National"
                        name="id_nat" />
                </div>
                <div class="col-md-6 fv-row">
                    <input class="form-control form-control-solid" wire:model='numCNSS' placeholder="N° CNSS"
                        name="num_cnss" />
                </div>
            </div>
        </div>
        <!--end::Scroll-->
    </div>
    <!--end::Modal body-->
    <!--begin::Modal footer-->
    <div class="modal-footer flex-center">
        <!--begin::Button-->
        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
        <!--end::Button-->
        <!--begin::Button-->
        <button class="btn btn-primary" id="kt_button_1">
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
