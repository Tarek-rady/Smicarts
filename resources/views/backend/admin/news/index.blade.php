@extends('layouts.backend.master')

@section('title')
{{ trans('defult.news') }}
@endsection


@section('style')

@endsection




@section('content')

    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ trans('defult.news') }}</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a new">
                <a href="{{ route('news.create') }}" class="btn btn-primary">
                    <span><i class="fa fa-plus"></i></span>
                    <span> {{ trans('defult.add news') }} </span>
                </a>

            </div>
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
                            <th class="min-w-150px">{{ trans('defult.title') }}</th>
                            <th class="min-w-150px">{{ trans('defult.message') }}</th>
                            <th class="min-w-150px">{{ trans('defult.created_at') }}</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($news as $new)

                            <tr>
                                <td>{{ $new->title}}</td>
                                <td>{{ $new->message}}</td>
                                <td>{{ $new->created_at}}</td>
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
