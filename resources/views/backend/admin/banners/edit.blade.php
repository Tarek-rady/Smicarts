@extends('layouts.backend.master')

@section('title')
{{ trans('banners.edit banner') }}
@endsection


@section('style')

@endsection




@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> {{ trans('banners.edit banner') }} </h6>
            <div class="ml-auto">
                <a href="{{ route('banners.index') }}" class="btn btn-primary">
                <span><i class="fa fa-home"></i></span>
                <span> {{ trans('banners.banners') }} </span>
            </a>
            </div>
        </div>

        <div class="card-body">

            <form action="{{ route('banners.update' , $banner->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
               @method('PUT')
                @csrf

                <div class="row">
                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                           {{ trans('defult.arabic name') }}    </span>
                        </label>
                        <input type="text"  name="name" value="{{$banner->getTranslation('name','ar')}}" class="form-control form-control-solid" placeholder="Enter name" >
                        @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>

                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                           {{ trans('defult.english name') }}
                            </span>
                        </label>
                        <input type="text"  name="name_en" value="{{$banner->getTranslation('name','en')}}" class="form-control form-control-solid" placeholder="Enter name" >
                        @error('name_en') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>


                </div>

               <div class="row">
                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ trans('banners.url') }}
                            </span>
                        </label>
                        <input type="text"  name="url" value="{{ old('url' , $banner->url) }}" class="form-control form-control-solid" placeholder="Enter URL" >
                        @error('url') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>

                    <div class="col-md-6 fv-row">
                        <label class="required fs-6 fw-bold mb-2"> {{ trans('banners.company') }}</label>
                        <select class="form-select form-select-solid"  data-hide-search="true" data-placeholder="Select a Branches" name="company_id" id="company_id">

                            <option value="{{ $banner->company_id }}">{{ $banner->company->company_name }}</option>
                            <option value=""> {{ trans('banners.company') }} ...</option>

                            @foreach ($companies as $company)
                               <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach



                        </select>
                        @error('company_id') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>

               </div>



                <div class="row pt-4">

                    <div class="col-6">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ trans('banners.img') }}
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
