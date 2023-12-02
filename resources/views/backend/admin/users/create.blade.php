@extends('layouts.backend.master')

@section('title')
{{ trans('users.add user') }}
@endsection


@section('style')

@endsection




@section('content')


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ trans('users.add user') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('users.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ trans('users.users') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('users.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
            @csrf

            {{-- name , email --}}

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ trans('users.name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name') }}" class="form-control form-control-solid" placeholder="Enter Your Name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                         {{ trans('users.email') }}
                        </span>
                    </label>
                    <input type="email"  name="email" value="{{ old('email') }}" class="form-control form-control-solid" placeholder="Enter Your Email" >
                    @error('email') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>




            </div>

            {{-- mobile --}}

           <div class="row">


                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                          {{ trans('users.mobile') }}
                        </span>
                    </label>
                    <input type="number"  name="mobile" value="{{ old('mobile') }}" class="form-control form-control-solid" placeholder="Enter Your mobile" >
                    @error('mobile') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>
           </div>


            {{-- img --}}

            <div class="row pt-4">

                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ trans('users.img') }}
                        </span>
                    </label>
                    <div >
                        <input type="file" name="img" class="form-control" >
                        <span class="form-text text-muted">Image with should be jpg , jpeg , png</span>
                        @error('img') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
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
