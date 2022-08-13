    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                {{-- Edit --}}
                @if (!is_null($form_edit))
                <div class="card">
                    <div class="card-body pt-0">
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
                                                        <input type="text" wire:model='code'
                                                            class="form-control form-control-solid" placeholder=""
                                                            name="code" />
                                                        @error('code')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 fv-row">
                                                        <!--end::Label-->
                                                        <label class="required fs-5 fw-bold mb-2">Nommination</label>
                                                        <!--end::Label-->
                                                        <!--end::Input-->
                                                        <input type="text" wire:model='nomOperateur'
                                                            class="form-control form-control-solid" placeholder=""
                                                            name="nommination" />
                                                        <!--end::Input-->
                                                        @error('nomOperateur')
                                                        <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                            </fieldset>
                                            <div class="text-right">
                                                <button class="btn btn-light-success col-sm-12" wire:click=update()><i
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
                    </div>
                </div>
                @endif
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
                                <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add_element_forms">
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
                                    <!--end::Svg Icon-->Ajouter un Operateur
                                </a>
                                <!--end::Add subscription-->
                            </div>
                            <!--end::Toolbar-->
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
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_subscriptions_table .form-check-input"
                                                value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px">CODE OPERATEUR</th>
                                    <th class="min-w-125px">NOM OPERATEUR</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                <tr>
                                    @forelse ($operateurs as $operateur)
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox"
                                                value="{{$operateur->id}}" />
                                        </div>
                                    </td>
                                    <td>
                                        <a href=""
                                            class="text-gray-800 text-hover-primary mb-1">{{$operateur->code}}</a>
                                    </td>
                                    <td>
                                        <a href=""
                                            class="text-gray-800 text-hover-primary mb-1">{{$operateur->nomOperateur}}</a>
                                    </td>
                                    <td class="text-end">
                                        <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                            wire:click="displayformedit({{$operateur->id}})">
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
                                        <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"
                                            wire:click="delete({{$operateur->id}})">
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
                                <!--end::Action=-->
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
    <!--end::Content-->

<div class="modal fade" id="add_element_forms" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            @livewire('data.add-operateur')
            <!--end::Form-->
        </div>
    </div>
</div>
