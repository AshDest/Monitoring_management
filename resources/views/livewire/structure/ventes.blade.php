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
                        <a href="#" class="text-gray-600 text-hover-primary"></a>
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
</div>
<!--end::Table Widget 4-->
