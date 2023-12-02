@extends('layouts.backend.master')

@section('title')
{{ trans('side-bar.about') }}
@endsection


@section('style')

@endsection




@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">   {{ trans('side-bar.about') }}</h6>

        </div>

        <div class="card-body">

            <form action="{{ route('update-about-app' , $about->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ trans('defult.arabic title') }}
                            </span>
                        </label>
                        <input type="text"  name="title" class="form-control form-control-solid" value="{{$about->getTranslation('title','ar')}}" placeholder="Enter name" >
                        @error('title') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>

                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ trans('defult.English title') }}
                            </span>
                        </label>
                        <input type="text"  name="title_en" class="form-control form-control-solid" value="{{$about->getTranslation('title','en')}}" placeholder="Enter name" >
                        @error('title_en') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>


                </div>

                <div class="row">
                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                            {{ trans('defult.arabic desc') }}
                            </span>
                        </label>
                        <textarea name="desc" class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{$about->getTranslation('desc','ar')}}</textarea>
                        @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>

                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                 {{ trans('defult.English desc') }}
                            </span>
                        </label>
                        <textarea name="desc_en" class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{$about->getTranslation('desc','en')}}</textarea>
                        @error('desc_en') <span class="text-danger">{{ $message }}</span>  @enderror

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
