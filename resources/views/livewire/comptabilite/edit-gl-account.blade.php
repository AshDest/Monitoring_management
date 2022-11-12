<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <h3>Edit Compte Comptable</h3>
        </div>
    </div>
    <div class="card-body pt-0">
        <form wire:submit.prevent="edit">
            <!--begin::Scroll-->
            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_address_scroll" data-kt-scroll="true"
                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                data-kt-scroll-dependencies="#kt_modal_new_address_header"
                data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                <div class="row mb-5">
                    <div class="col-md-3 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Code</label>
                        <input type="text" wire:model='code' class="form-control form-control-solid" placeholder=""
                            name="code" />
                    </div>
                    <div class="col-md-9 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Description</label>
                        <!--end::Label-->
                        <!--end::Input-->
                        <input type="text" wire:model='description' class="form-control form-control-solid"
                            placeholder="" name="description" />
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Classe</label>
                        <select name="account_type_id" wire:model='account_classe'
                            data-placeholder="Select Type de Compte..."
                            class="form-select form-select-solid @error('account_classe') is-invalid @enderror">
                            <option value=""> -- Select Classe Compte --</option>
                            @foreach ($classes as $classe)
                            <option value="{{$classe->id}}">{{$classe->designation}}</option>
                            @endforeach
                        </select>
                        @error('account_classe')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Type de Compte</label>
                        <select name="account_type_id" wire:model='account_type_id'
                            data-placeholder="Select Type de Compte..."
                            class="form-select form-select-solid @error('account_type_id') is-invalid @enderror">
                            <option value="">-- Select Type Compte --</option>
                            @foreach ($accounttypes as $accounttype)
                            <option value=" {{$accounttype->id}}">{{$accounttype->designation}}</option>
                            @endforeach
                        </select>
                        @error('account_type_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Niveau de Compte</label>
                        <select name="account_level_id" wire:model='account_level_id'
                            data-placeholder="Select niveau de Compte...."
                            class="form-select form-select-solid @error('account_level_id') is-invalid @enderror">
                            <option value="">-- Select Niveau Compte --</option>
                            @foreach ($levels as $level)
                            <option value="{{$level->id}}">Niveau: {{$level->level}}</option>
                            @endforeach
                        </select>
                        @error('account_level_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="required fs-5 fw-bold mb-2">Currency</label>
                        <select name="currency_id" wire:model='currency_id' data-placeholder="-- Select Currency --"
                            class="form-select form-select-solid @error('currency_id') is-invalid @enderror">
                            <option value="">-- Select Monnaie --</option>
                            <option value="FC">Franc Congolais : FC</option>
                            <option value="$">Dollars Americain : $</option>
                        </select>
                        @error('currency_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row g-9 mb-5">
                    <!--begin::Button-->
                    <button class="btn btn-primary">
                        <span class="indicator-label">
                            Ajouter le Compte
                        </span>
                    </button>
                    <!--end::Button-->
                </div>
            </div>
        </form>
    </div>
</div>
