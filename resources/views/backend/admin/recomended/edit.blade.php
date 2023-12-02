<div class="modal fade" id="Edit{{ $city->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form action="{{ route('recomended.update' , $city->id) }}" class="form" method="POST">
                   @method('PUT')
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">{{ trans('defult.edit company') }}</h1>
                        <!--end::Title-->

                    </div>
                    <!--end::Heading-->

                    <div class="col-md-6 fv-row">
                        <label class="required fs-6 fw-bold mb-2">{{ trans('defult.companies') }}</label>
                        <select class="form-select form-select-solid"  data-hide-search="true" data-placeholder="Select a Branches" name="company_id" id="company_id">

                            <option value="{{ $city->company_id }}">{{ $city->company->company_name }}</option>
                            <option value=""> {{ trans('defult.companies') }}...</option>
                            @foreach ($companies as $company)
                               <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach



                        </select>
                        @error('company_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>


                    <!--begin::Input group-->

                    <!--end::Input group-->


                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">{{ trans('users.Submit') }}</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
