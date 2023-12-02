@extends('layouts.backend.master')

@section('title')
 {{ trans('side-bar.contact-us') }}
@endsection


@section('style')

@endsection




@section('content')

    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ trans('side-bar.contact-us') }}</span>
            </h3>

            <a href="{{ route('contact-us-export') }}" class="btn btn-success">
                <span><i class="fas fa-file-download"></i></span>
                <span>{{ trans('defult.export') }}</span>
            </a>

        </div>
        <!--end::Header-->


        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="datatable">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">

                            <th class="min-w-150px">{{ trans('defult.authors') }}</th>
                            <th class="min-w-140px">{{ trans('users.mobile') }}</th>
                            <th class="min-w-130px">{{ trans('defult.message') }}</th>
                            <th class="min-w-130px">{{ trans('defult.complaint type') }}</th>

                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($contacts as $contact)

                            <tr>
                                <td>

                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="{{ asset('Attachments/contacts/'.$contact->img) }}" alt="" />
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $contact->name }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $contact->mobile }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $contact->id }}">Read</button>
                                            @include('backend.admin.contact-us.seemore')
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $contact->complaint_type }}</span>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                        @endforeach


                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>



@endsection



@section('script')

@endsection
