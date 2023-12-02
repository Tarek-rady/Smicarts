@extends('layouts.backend.master')

@section('title')

Add Company

@endsection


@section('style')

@endsection




@section('content')


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> إضافة عملية سحب </h6>
        <div class="ml-auto">
            <a href="{{route('companies.wallet.index', $company->id)}}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Company Wallet </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('companies.wallet.store', $company->id)}}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework">
            @csrf

            <div class="row">
                <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           المبلغ(سحب)
                        </span>
                    </label>
                    <input type="text"  name="debit" value="{{ old('debit') }}" class="form-control form-control-solid" placeholder="Enter amount" >
                    @error('debit') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

              <div class="pt-15">
                  <button type="submit" class="btn btn-primary">
                      <span class="indicator-label">{{ trans('users.Submit') }}</span>
                      <span class="indicator-progress">Please wait...</span>
                  </button>
              </div>
            </div>


        </form>

    </div>

</div>



@endsection
