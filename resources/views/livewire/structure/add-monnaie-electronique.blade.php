<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title">

        </div>
    </div>
    <div class="card-body pt-0">
        <!--begin::Scroll-->
        <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
            data-kt-scroll-dependencies="#kt_modal_new_address_header"
            data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
            <form class="form" wire:submit.prevent="save">
                <div class="row mb-5">
                    <div class="col-md-4 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Operateur Telephonique</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <select name="codeOperateur" wire:model='codeOperateur' class="form-select form-select-solid">
                            <option value=""> -- Select Operateur -- </option>
                            @foreach ($operateurs as $operateur)
                            <option value="{{$operateur->id}}">{{$operateur->nomOperateur}}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <div class="col-md-4 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Numero Telephone</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" wire:model='numTel' class="form-control form-control-solid" placeholder=""
                            name="numTel" />
                        <!--end::Input-->
                    </div>
                    <div class="col-md-4 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Num Comptable</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" wire:model='GLMonnaieE' class="form-control form-control-solid"
                            placeholder="" name="GLMonnaieE" />
                        <!--end::Input-->
                    </div>
                </div>
                <div class="row mb-5">
                    <button class="btn btn-primary">
                        <span class="indicator-label">
                            Save
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
        <!--end::Scroll-->
    </div>

</div>
