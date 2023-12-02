@extends('layouts.backend.master')

@section('title')
{{ trans('defult.Store links') }}
@endsection


@section('style')

@endsection




@section('content')


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">  {{ trans('defult.Store links') }} </h6>

    </div>

    <div class="card-body">

        <form action="{{ route('update-api-route' , $apis->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">

            @csrf

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                          Google play url
                        </span>
                    </label>
                    <input type="text"  name="Google_play_url" class="form-control form-control-solid" value="{{ $apis->Google_play_url }}" placeholder="Enter name" >
                    @error('Google_play_url') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           App store url
                        </span>
                    </label>
                    <input type="text"  name="App_store_url" class="form-control form-control-solid" value="{{$apis->App_store_url}}" placeholder="Enter name" >
                    @error('App_store_url') <span class="text-danger">{{ $message }}</span>  @enderror

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

@endsection
