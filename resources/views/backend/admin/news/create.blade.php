@extends('layouts.backend.master')

@section('title')
{{ trans('defult.add news') }}
@endsection


@section('style')

@endsection




@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary"> {{ trans('defult.add news') }} </h6>
            <div class="ml-auto">
                <a href="{{ route('news.index') }}" class="btn btn-primary">
                <span><i class="fa fa-home"></i></span>
                <span> {{ trans('defult.news') }} </span>
            </a>
            </div>
        </div>

        <div class="card-body">

            <form action="{{ route('news.store') }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ trans('defult.title') }}
                            </span>
                        </label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-solid" placeholder="Enter title" >
                        @error('title') <span class="text-danger">{{ $message }}</span>  @enderror
                    </div>
                </div>
                <div class="row">

                    <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ trans('defult.message') }}
                            </span>
                        </label>
                        <textarea name="message" class="form-control form-control-solid"  placeholder="Enter message" rows="3"></textarea>
                        @error('message') <span class="text-danger">{{ $message }}</span>  @enderror

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
