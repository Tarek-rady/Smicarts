@extends('layouts.backend.master')

@section('title')

{{ trans('defult.edit company') }}

@endsection


@section('style')

@endsection




@section('content')


<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary"> {{ trans('defult.edit company') }} </h6>
        <div class="ml-auto">
            <a href="{{ route('companies.index') }}" class="btn btn-primary">
            <span><i class="fa fa-home"></i></span>
            <span> {{ trans('defult.companies') }} </span>
        </a>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('companies.update' , $company->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">

            @method('PUT')
            @csrf

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                          {{ trans('defult.arabic name') }}
                        </span>
                    </label>
                    <input type="text"  name="company_name" value="{{$company->getTranslation('company_name','ar')}}" class="form-control form-control-solid" placeholder="Enter Company name" >
                    @error('company_name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ trans('defult.english name') }}
                        </span>
                    </label>
                    <input type="text"  name="company_name_en" value="{{$company->getTranslation('company_name','en')}}" class="form-control form-control-solid" placeholder="Enter name" >
                    @error('company_name_en') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>


            </div>

            <div class="row">
                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                           {{ trans('defult.admin name') }}
                        </span>
                    </label>
                    <input type="text"  name="name" value="{{ old('name' , $company->name) }}" class="form-control form-control-solid" placeholder="Enter Admin name" >
                    @error('name') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                          {{ trans('defult.email') }}
                        </span>
                    </label>
                    <input type="email"  name="email" value="{{ old('email' , $company->email) }}" class="form-control form-control-solid" placeholder="Enter Admin Email" >
                    @error('email') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="d-flex col-4 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                          {{ trans('defult.password') }}
                        </span>
                    </label>
                    <input type="password"  name="password" value="{{ old('password') }}" class="form-control form-control-solid" placeholder="Enter Admin password" >
                    @error('password') <span class="text-danger">{{ $message }}</span>  @enderror
                </div>


            </div>

           <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ trans('defult.arabic desc') }}
                        </span>
                    </label>
                    <textarea name="desc" class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{$company->getTranslation('desc','ar')}}</textarea>
                       @error('desc') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ trans('defult.English desc') }}
                        </span>
                    </label>
                    <textarea name="desc_en" class="form-control form-control-solid"  placeholder="Enter Service desc" rows="3">{{$company->getTranslation('desc','en')}}</textarea>
                       @error('desc_en') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>
           </div>

            <div class="row">

                <div class="col-md-4 fv-row">
                    <label class="required fs-6 fw-bold mb-2">{{ trans('defult.category') }}</label>
                    <select class="form-select form-select-solid"  data-hide-search="true" data-placeholder="Select a categories" name="category_id" id="category_id">
                        <option value="{{ $company->category_id }}">{{ $company->category->name }}</option>
                        <option value=""> {{ trans('defult.category') }} ...</option>
                        @foreach ($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach



                    </select>
                    @error('category_id') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>


                <div class="col-md-4 fv-row">
                    <label class="required fs-6 fw-bold mb-2">{{ trans('defult.sub category') }}</label>
                    <select class="form-select form-select-solid"  data-hide-search="true" data-placeholder="Select a subCategories" name="subcategory_id" id="subcategory_id">
                       <option value="{{ $company->subcategory_id }}">{{ $company->subCategory->name }}</option>
                        <option value=""> {{ trans('defult.sub category') }} ...</option>


                    </select>
                    @error('subcategory_id') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>


                <div class="col-md-4 fv-row">
                    <label class="required fs-6 fw-bold mb-2">{{ trans('defult.city') }}</label>
                    <select class="form-select form-select-solid"  data-hide-search="true" data-placeholder="Select a cities" name="city_id" id="city_id">
                        <option value="{{ $company->city_id }}">{{ $company->city->name }}</option>
                        <option value=""> {{ trans('defult.city') }} ...</option>

                        @foreach ($cities as $city)
                           <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach



                    </select>
                    @error('city_id') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>
                <div class="col-md-4 fv-row">
                    <label class="required fs-6 fw-bold mb-2">payment types</label>
                    <select class="form-select form-select-solid"  data-hide-search="true" data-placeholder="Select a cities" name="payment_type" id="payment_type">
                           <option value="1" {{ $company->payment_type == 1 ? 'selected' : ''}}>Cash</option>
                           <option value="2" {{ $company->payment_type == 2 ? 'selected' : ''}}>Visa</option>
                           <option value="3" {{ $company->payment_type == 3 ? 'selected' : ''}}>Both (Cash and Visa)</option>


                    </select>
                    @error('payment_type') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

                <div class="col-md-4 fv-row">
                    <label class="required fs-6 fw-bold mb-2">{{ trans('defult.price') }} (for person)</label>
                    <input type="price"  name="price" value="{{ $company->price }}" class="form-control form-control-solid" placeholder="Enter Price" >

                    @error('price') <span class="text-danger">{{ $message }}</span>  @enderror

                </div>

            </div><br>

            <div class="row">

                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">
                            {{ trans('defult.icon') }}
                        </span>
                    </label>
                    <div >
                        <input type="file" name="icon" class="form-control" >
                        <span class="form-text text-muted">Image with should be jpg , jpeg , png</span>
                        @error('icon') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>

                <div class="col-6">
                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                        <span class="required">

                            {{ trans('defult.cover') }}
                        </span>
                    </label>
                    <div >
                        <input type="file" name="cover" class="form-control" >
                        <span class="form-text text-muted">Image with should be jpg , jpeg , png</span>
                        @error('cover') <span class="text-danger">{{ $message }}</span>  @enderror

                    </div>
                </div>


            </div>

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                            <span class="required">
                                {{ trans('defult.searchInput') }}
                            </span>
                        </label>
                            <input type="text"  value="{{ $company->location }}"  class="form-control form-control-solid" id="searchInput" >

                </div>
           </div>

            <div class="row">
                <div class="d-flex col-6 flex-column mb-7 fv-row fv-plugins-icon-container">
                    <input type="hidden" name="location" class="form-control" id="location">
                    <input type="hidden" name="lat" value="31.343764920778625" class="form-control" id="lat">
                    <input type="hidden" name="lng" value="30.11298220386465" class="form-control" id="lng">
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

    <script>
        $(document).ready(function () {
            $('#category_id').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/subcategory-category') }}/" + category_id
                        , type: "GET"
                        , dataType: "json"
                        , success: function (data) {
                            $('#subcategory_id').empty();
                            $('#subcategory_id').append('<option selected disabled > -- Select subCategories... --</option>');
                            $.each(data, function (key, value) {
                                $('#subcategory_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                        ,
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

@include('backend.admin.companies.mab')

@endsection
