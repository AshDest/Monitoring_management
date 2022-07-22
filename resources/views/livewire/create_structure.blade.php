<!--begin::Modal - New Address-->
<div class="modal fade" id="kt_modal_new_address" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_new_address_form">
                <div class="modal-header" id="kt_modal_new_address_header">
                    <h2>Ajouter Nouveau Structure</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
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
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    name="code" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Nommination</label>
                                <!--end::Label-->
                                <!--end::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    name="designation" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Adresse</label>
                            <div class="col-md-6 fv-row">
                                <select name="province" data-control="select2" data-dropdown-parent="#kt_modal_new_address"
                                data-placeholder="Select Provinces..." class="form-select form-select-solid">
                                <option value="">Select a Country...</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Aland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                            </select>
                            </div>
                            <div class="col-md-6 fv-row">
                                <select name="territoire" data-control="select2" data-dropdown-parent="#kt_modal_new_address"
                                data-placeholder="Select Ville/Territoires ...." class="form-select form-select-solid">
                                <option value="">Select a Country...</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Aland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                            </select>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 fv-row">
                                <select name="commune" data-control="select2" data-dropdown-parent="#kt_modal_new_address"
                                data-placeholder="Select Communes/Secteurs/Chefferies..." class="form-select form-select-solid">
                                <option value="">Select a Country...</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Aland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                            </select>
                            </div>
                            <div class="col-md-6 fv-row">
                                <select name="quartier" data-control="select2" data-dropdown-parent="#kt_modal_new_address"
                                data-placeholder="Select Quartier/Village..." class="form-select form-select-solid">
                                <option value="">Select a Country...</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Aland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                            </select>
                            </div>
                        </div>
                        <div class="row g-9 mb-5">
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">Avenue</label>
                                <input class="form-control form-control-solid" placeholder="" name="avenue" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">Code Parcelle</label>
                                <input class="form-control form-control-solid" placeholder="" name="numParcelle" />
                            </div>
                        </div>

                        <div class="row g-9 mb-5">
                            <label class="fs-5 fw-bold mb-2">Coordonnees Geographique</label>
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">Longitude</label>
                                <input class="form-control form-control-solid" placeholder="" name="long" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">Latitude</label>
                                <input class="form-control form-control-solid" placeholder="" name="lat" />
                            </div>
                        </div>
                        <div class="row g-9 mb-5">
                            <label class="fs-5 fw-bold mb-2">Contact Telephoniques</label>
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">Numero 1</label>
                                <input class="form-control form-control-solid" placeholder="" name="tel1" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">Numero 2</label>
                                <input class="form-control form-control-solid" placeholder="" name="tel2" />
                            </div>
                        </div>

                        <div class="row g-9 mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="fs-5 fw-bold mb-2">Email</label>
                                <input class="form-control form-control-solid" placeholder="" name="email" />
                            </div>
                        </div>
                        <div class="row g-9 mb-5">
                            <div class="col-md-12 fv-row">
                                <label class="fs-5 fw-bold mb-2">Web Site</label>
                                <input class="form-control form-control-solid" placeholder="" name="website" />
                            </div>
                        </div>
                        <div class="row g-9 mb-5">
                            <label class="fs-5 fw-bold mb-2">Indentification</label>
                            <div class="col-md-6 fv-row">
                                <input class="form-control form-control-solid" placeholder="RCCM" name="rccm" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <input class="form-control form-control-solid" placeholder="N°Impot" name="num_impot" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <input class="form-control form-control-solid" placeholder="ID National" name="id_nat" />
                            </div>
                            <div class="col-md-6 fv-row">
                                <input class="form-control form-control-solid" placeholder="N° CNSS" name="num_cnss" />
                            </div>
                        </div>
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_new_address_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_new_address_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal - New Address-->
