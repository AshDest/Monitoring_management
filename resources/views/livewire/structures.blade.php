<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <div class="card-body pt-0">
                        @if (!is_null($form_edit))
                        <!--begin::Alert-->
                        <div class="py-5">
                            <div class="rounded border p-10 pb-0 d-flex flex-column">
                                <!--begin::Alert-->
                                <div
                                    class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                                    <!--begin::Content-->
                                    <div class="d-flex flex-column pe-0 pe-sm-10">
                                        <h4 class="fw-bold">Modification</h4>
                                        <!--begin::Content-->
                                        <form>
                                            <fieldset>
                                                <div class="row mb-5">
                                                    <div class="col-md-4 fv-row">
                                                        <label class="required fs-5 fw-bold mb-2">Code</label>
                                                        <input type="text" wire:model='codeStructure'
                                                            class="form-control form-control-solid" placeholder=""
                                                            name="code" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <!--end::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">Nommination</label>
                                                        <!--end::Label-->
                                                        <!--end::Input-->
                                                        <input type="text" wire:model='designation'
                                                            class="form-control form-control-solid" placeholder=""
                                                            name="designation" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="required fs-5 fw-bold mb-2">Province</label>
                                                        <select name="province" wire:model='selectedProvince'
                                                            data-placeholder="Select Provinces..." class="form-select">
                                                            <option value="">Select a province...</option>
                                                            @foreach ($provinces as $province)
                                                            <option value="{{$province->id}}">{{$province->designation}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="required fs-5 fw-bold mb-2">Ville /
                                                            Territoire</label>
                                                        <select name="territoire" wire:model='selectedCity'
                                                            data-placeholder="Select Ville/Territoires ...."
                                                            class="form-select">
                                                            <option value="">Select a Ville...</option>
                                                            @foreach ($territoires as $territoire)
                                                            <option value="{{$territoire->id}}">
                                                                {{$territoire->designation}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="required fs-5 fw-bold mb-2">Commune</label>
                                                        <select name="commune" wire:model='selectedCommune'
                                                            data-placeholder="Select Communes/Secteurs/Chefferies..."
                                                            class="form-select">
                                                            <option value="">Select a Commune...</option>
                                                            @foreach ($communes as $commune)
                                                            <option value="{{$commune->id}}">{{$commune->designation}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="required fs-5 fw-bold mb-2">Quartier</label>
                                                        <select name="quartier" wire:model='selectedQuartier'
                                                            data-placeholder="Select Quartier/Village..."
                                                            class="form-select">
                                                            <option value="">Select a Quartier...</option>
                                                            @foreach ($quartiers as $quartier)
                                                            <option value="{{$quartier->id}}">{{$quartier->designation}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Avenue</label>
                                                        <input class="form-control form-control-solid"
                                                            wire:model='avenu' placeholder="" name="avenue" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Code Parcelle</label>
                                                        <input class="form-control form-control-solid"
                                                            wire:model='numParcelle' placeholder=""
                                                            name="numParcelle" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Longitude</label>
                                                        <input class="form-control form-control-solid" wire:model='long'
                                                            placeholder="" name="long" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Latitude</label>
                                                        <input class="form-control form-control-solid" wire:model='lat'
                                                            placeholder="" name="lat" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Numero 1</label>
                                                        <input class="form-control form-control-solid"
                                                            wire:model='numTel1' placeholder="" name="tel1" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Numero 2</label>
                                                        <input class="form-control form-control-solid"
                                                            wire:model='numTel2' placeholder="" name="tel2" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Email</label>
                                                        <input class="form-control form-control-solid"
                                                            wire:model='email' placeholder="" name="email" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">RCCM </label>
                                                        <input class="form-control form-control-solid" wire:model='rccm'
                                                            placeholder="RCCM" name="rccm" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Numero Impot</label>
                                                        <input class="form-control form-control-solid"
                                                            wire:model='numImpot' placeholder="N°Impot"
                                                            name="num_impot" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">ID National</label>
                                                        <input class="form-control form-control-solid"
                                                            wire:model='idNational' placeholder="ID National"
                                                            name="id_nat" />
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <label class="fs-5 fw-bold mb-2">Num CNSS</label>
                                                        <input class="form-control form-control-solid"
                                                            wire:model='numCNSS' placeholder="N° CNSS"
                                                            name="num_cnss" />
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="text-right">
                                                <button class="btn btn-light-success col-sm-12"
                                                    wire:click=modifycmpt()><i
                                                        class="fas fa-save"></i>&nbsp;&nbsp;Modifier</button>
                                            </div>
                                        </form>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Close-->
                                    <button type="button"
                                        class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                        data-bs-dismiss="alert">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Close-->
                                </div>
                                <!--end::Alert-->
                            </div>
                        </div>
                        <!--end::Alert-->
                        @endif
                    </div>
                </div>
                <div>
                </div>
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-subscription-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-14"
                                    placeholder="Search Subscriptions" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                                <!--begin::Add subscription-->
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_banque">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Ajouter un agent
                                </a>
                                <!--end::Add subscription-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-subscription-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2"
                                        data-kt-subscription-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-subscription-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                data-kt-check="true" data-kt-check-target=".widget-13-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-150px">Code</th>
                                    <th class="min-w-140px">Nommination</th>
                                    <th class="min-w-120px">Adresse Complete</th>
                                    <th class="min-w-120px">Email</th>
                                    <th class="min-w-120px">Contact</th>
                                    <th class="min-w-120px">Numero Impot</th>
                                    <th class="min-w-100px text-end">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                @forelse ($structures as $structure)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input widget-13-check" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/{{$structure->id}}/home"
                                            class="text-gray-800 text-hover-primary mb-1">{{$structure->codeStructure}}</a>
                                    </td>
                                    <td>
                                        <a href="/{{$structure->id}}/home"
                                            class="text-gray-800 text-hover-primary mb-1">{{$structure->designation}}</a>
                                    </td>
                                    <td>
                                        <a href="/{{$structure->id}}/home"
                                            class="text-gray-800 text-hover-primary mb-1">{{$structure->avenu}}</a>
                                        <span
                                            class="text-muted fw-bold text-muted d-block fs-7">{{$structure->addresse->designation}}</span>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">
                                            {{$structure->addresse->communesecteurchefferie->villeterritoires->designation}}:
                                            {{$structure->addresse->communesecteurchefferie->designation}}
                                        </span>
                                        <span class="text-muted fw-bold text-muted d-block fs-7">
                                            {{$structure->addresse->communesecteurchefferie->villeterritoires->province->designation}}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="/{{$structure->id}}/home"
                                            class="text-gray-800 text-hover-primary mb-1">{{$structure->email}}</a>
                                    </td>
                                    <td>
                                        <a href="/{{$structure->id}}/home"
                                            class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$structure->numTel1}}</a>
                                        <span
                                            class="text-muted fw-bold text-muted d-block fs-7">{{$structure->numTel2}}</span>
                                    </td>
                                    <td>
                                        <a href="/{{$structure->id}}/home"
                                            class="text-gray-800 text-hover-primary mb-1">{{$structure->numImpot}}</a>
                                    </td>
                                    <td class="text-end">
                                        <a href="/{{$structure->id}}/home"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                                                        fill="currentColor" />
                                                    <path d="M7 16H6C5.4 16 5 15.6 5 15V13H8V15C8 15.6 7.6 16 7 16Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M18 16H17C16.4 16 16 15.6 16 15V13H19V15C19 15.6 18.6 16 18 16Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                                                        fill="currentColor" />
                                                    <path d="M7 5H6C5.4 5 5 4.6 5 4V2H8V4C8 4.6 7.6 5 7 5Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                                                        fill="currentColor" />
                                                    <path d="M18 5H17C16.4 5 16 4.6 16 4V2H19V4C19 4.6 18.6 5 18 5Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <a wire:click="displayformedit({{$structure->id}})"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <a wire:click="delete({{ $structure->id }})"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.5"
                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.5"
                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                    </td>

                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    <center> . . . Liste vide . . .</center>
                                </div>
                                @endforelse
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
</div>

<div class="modal fade" id="add_banque" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            @livewire('create-structure')
            <!--end::Form-->
        </div>
    </div>
</div>
