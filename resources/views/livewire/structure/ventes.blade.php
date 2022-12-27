<!--begin::Post-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-subscription-table-filter="search"
                    class="form-control form-control-solid w-250px ps-14" placeholder="Search Subscriptions" />
            </div>
            <!--end::Search-->
        </div>
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-50px">N°</th>
                    <th class="min-w-100px">Vente ID</th>
                    <th class="text-end min-w-100px">Date</th>
                    <th class="text-end min-w-125px">ClientS</th>
                    <th class="text-end min-w-100px">Total</th>
                    <th class="text-end min-w-50px">Status</th>
                    <th class="text-end"></th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bolder text-gray-600">
                <tr data-kt-table-widget-4="subtable_template" class="d-none">
                    <td colspan="2">
                        <div class="d-flex align-items-center gap-3">
                            <a href="#" class="symbol symbol-50px bg-secondary bg-opacity-25 rounded">
                                <img src="" data-kt-src-path="assets/media/stock/ecommerce/" alt=""
                                    data-kt-table-widget-4="template_image" />
                            </a>
                            <div class="d-flex flex-column text-muted">
                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder"
                                    data-kt-table-widget-4="template_name">Product name</a>
                                <div class="fs-7" data-kt-table-widget-4="template_description">Product description
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-end">
                        <div class="text-gray-800 fs-7">Cost</div>
                        <div class="text-muted fs-7 fw-bolder" data-kt-table-widget-4="template_cost">1</div>
                    </td>
                    <td class="text-end">
                        <div class="text-gray-800 fs-7">Qty</div>
                        <div class="text-muted fs-7 fw-bolder" data-kt-table-widget-4="template_qty">1</div>
                    </td>
                    <td class="text-end">
                        <div class="text-gray-800 fs-7">Total</div>
                        <div class="text-muted fs-7 fw-bolder" data-kt-table-widget-4="template_total">name</div>
                    </td>
                    <td class="text-end">
                        <div class="text-gray-800 fs-7 me-3">On hand</div>
                        <div class="text-muted fs-7 fw-bolder" data-kt-table-widget-4="template_stock">32</div>
                    </td>
                    <td>

                    </td>
                </tr>
                @php
                $i = 1;
                @endphp
                @forelse ($ventes as $vente)
                <tr>
                    <td>
                        @php
                        echo $i;
                        $i++;
                        @endphp
                    </td>
                    <td>
                        <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html"
                            class="text-gray-800 text-hover-primary">#{{$vente->trans_id}}</a>
                    </td>
                    <td class="text-end">{{$vente->dateVente}}</td>
                    <td class="text-end">
                        @if ($vente->codeClient)
                        <a href="#" class="text-gray-600 text-hover-primary">{{$vente->client->noms}}</a>
                        @else
                        <span class="badge py-3 px-4 fs-7 badge-light-danger">Pas de Client</span>
                        @endif
                    </td>
                    <td class="text-end">${{$vente->montantTotal}}</td>
                    <td class="text-end">
                        <span class="badge py-3 px-4 fs-7 badge-light-success">Pending</span>
                    </td>
                    <td class="text-end">
                        <button type="button"
                            class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                            data-kt-table-widget-4="expand_row">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                            <span class="svg-icon svg-icon-3 m-0 toggle-off">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1"
                                        transform="rotate(-90 11 18)" fill="currentColor" />
                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                            <span class="svg-icon svg-icon-3 m-0 toggle-on">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
</div>
<!--end::Table Widget 4-->
