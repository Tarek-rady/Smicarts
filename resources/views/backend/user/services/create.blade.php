@extends('layouts.backend.master')

 @section('title')
  Add service
 @endsection

 @section('style')

 @endsection


 @section('content')


 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">  Add service </h6>
        <div class="ml-auto">
            <a href="{{ route('services.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> Services </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('services.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
            @csrf

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ trans('defult.arabic name') }}</span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name') }}" class="form-control form-control-solid" placeholder="Enter Service name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                          {{ trans('defult.english name') }}
                        </span>
                    </label>
                    <input type="text"  name="name_en" value="{{ old('name_en') }}" class="form-control form-control-solid" placeholder="Enter Service name" >
                    @error('name_en') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>


            </div>

            <div class="row">

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            Price
                        </span>
                    </label>
                    <input type="number"  name="price" value="{{ old('price') }}" class="form-control form-control-solid" placeholder="Enter price" >
                    @error('price') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>



            </div>
            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ trans('defult.arabic desc') }}
                        </span>
                    </label>
                     <textarea name="desc"  class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{ old('desc_ar') }}</textarea>
                    @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ trans('defult.English desc') }}
                        </span>
                    </label>
                    <textarea name="desc_en" class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{ old('desc_en') }}</textarea>
                       @error('desc_en') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>
            </div>






            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">{{ trans('defult.submit') }}</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>


 @endsection



 @section('js')

 @endsection
