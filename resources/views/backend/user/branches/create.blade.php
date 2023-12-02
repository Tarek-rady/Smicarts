@extends('layouts.backend.master')

@section('title')
{{ trans('side-bar.add branch') }}
@endsection


@section('style')

@endsection




@section('content')

 <div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ trans('side-bar.add branch') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('branches.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ trans('side-bar.branches') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('branches.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ trans('defult.arabic name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name') }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                          {{ trans('defult.english name') }}
                        </span>
                    </label>
                    <input type="text"  name="name_en" value="{{ old('name_en') }}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('name_en') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


            </div><br>

           <div class="row">
                <div class="d-flex col-12 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ trans('defult.searchInput') }}
                            </span>
                        </label>
                            <input type="text"  name="icon"  class="form-control form-control-solid" id="searchInput" >

                </div>
           </div>

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <input type="hidden" name="location" class="form-control" id="location">
                    <input type="hidden" name="lat" class="form-control" id="lat">
                    <input type="hidden" name="lng" class="form-control" id="lng">
                    <div id="map" style="height: 500px;width: 1000px;">
                </div>
            </div>






            <div class="text-center pt-15">
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">{{ trans('users.Submit') }}</span>
                    <span class="indicator-progress">Please wait...</span>
                </button>
            </div>

        </form>

    </div>

</div>



@endsection



@section('script')

@include('backend.user.branches.mab')

@endsection
