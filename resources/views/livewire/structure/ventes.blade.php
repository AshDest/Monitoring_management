<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<!--begin::Row-->
<div class="row gy-5 g-xl-10">
    <!--begin::Col-->
    <div class="col-xl-12 mb-5 mb-xl-10">
        <!--begin::Table Widget 4-->
        <div class="card card-flush h-xl-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder text-gray-800">La liste detaillees de toutes les Ventes</span>
                    {{-- <span class="text-gray-400 mt-1 fw-bold fs-6">Avg. 57 orders per day</span> --}}
                </h3>
                <!--end::Title-->
                <!--begin::Actions-->
                <div class="card-toolbar">
                    <!--begin::Filters-->
                    <div class="d-flex flex-stack flex-wrap gap-4">
                        <!--begin::Destination-->
                        <div class="d-flex align-items-center fw-bolder">
                            <!--begin::Label-->
                            <div class="text-gray-400 fs-7 me-2">Cateogry</div>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select
                                class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bolder py-0 ps-3 w-auto"
                                data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px"
                                data-placeholder="Select an option">
                                <option></option>
                                <option value="Show All" selected="selected">Show All</option>
                                <option value="a">Category A</option>
                                <option value="b">Category A</option>
                            </select>
                            <!--end::Select-->
                        </div>
                        <!--end::Destination-->
                        <!--begin::Status-->
                        <div class="d-flex align-items-center fw-bolder">
                            <!--begin::Label-->
                            <div class="text-gray-400 fs-7 me-2">Status</div>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select
                                class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto"
                                data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px"
                                data-placeholder="Select an option" data-kt-table-widget-4="filter_status">
                                <option></option>
                                <option value="Show All" selected="selected">Show All</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Pending">Pending</option>
                            </select>
                            <!--end::Select-->
                        </div>
                        <!--end::Status-->
                        <!--begin::Search-->
                        <div class="position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
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
                            <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12"
                                placeholder="Search" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Filters-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-2">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-100px">Date Vente</th>
                            <th class="text-end min-w-100px">Noms du Client</th>
                            <th class="text-end min-w-125px">Montant Facture</th>
                            <th class="text-end min-w-100px">Type Vente</th>
                            {{-- <th class="text-end min-w-100px">Profit</th>
                            <th class="text-end min-w-50px">Status</th> --}}
                            <th class="text-end"></th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bolder text-gray-600">
                        @forelse ($ventes as $vente)
                            <tr>
                                <td class="text-end">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$vente->dateVente}}</a>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$vente->client->noms}}</a>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$vente->montantTotal}}</a>
                                </td>
                                <td class="text-end">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{$vente->dateVente}}</a>
                                </td>
                                {{-- <td class="text-end">
                                    <span class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                </td> --}}
                                {{-- <td class="text-end">
                                    <span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                </td>
                                <td class="text-end">
                                    <span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span>
                                </td> --}}
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Table Widget 4-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
</div>
</div>
