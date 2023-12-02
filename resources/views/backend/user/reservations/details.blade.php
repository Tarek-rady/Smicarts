@extends('layouts.backend.master')

@section('title')
  Reservations - details
@endsection


@section('style')

@endsection




@section('content')

    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Reservations - details</span>
            </h3>

            <a href="{{ route('company-reservation-export') }}" class="btn btn-success">
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
                    <tbody>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-150px">Reservation Number</th>
                            <th class="min-w-140px">number of people</th>
                            <th class="min-w-140px">Branch</th>
                            <th class="min-w-130px">desc</th>

                        </tr>


                        <tr>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $reservation->id }}</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $reservation->number_of_people }}</span>
                                    </div>
                                </div>
                            </td>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $reservation->branch->name }}</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#SeeMore{{ $reservation->id }}">Read</button>
                                        @include('backend.admin.reservations.seemore')
                                    </div>
                                </div>
                            </td>

                            

                        </tr>

                        <tr class="fw-bolder text-muted">
                            <th class="min-w-150px"> Status</th>
                            <th class="min-w-140px">User</th>
                            <th class="min-w-140px">Date</th>
                            <th class="min-w-130px">Time</th>

                        </tr>

                        <tr>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        @if ($reservation->status == 'complete')
                                            <span class="badge badge-light-success">{{ $reservation->status }}</span>
                                        @elseif ($reservation->status == 'canceled')
                                            <span class="badge badge-light-danger">{{ $reservation->status }}</span>
                                        @else
                                        <span class="badge badge-light-warning">{{ $reservation->status }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td>

                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                                                                  <img src="{{ $reservation->user->img ? asset('Attachments/users/'.$reservation->user->img) : asset('Attachments/users/1.png')}}" alt="" />

                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $reservation->user->name }}</span>
                                    </div>
                                </div>
                            </td>


                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $reservation->date }}</span>
                                    </div>
                                </div>
                            </td>


                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $reservation->time }}</span>
                                    </div>
                                </div>
                            </td>

                        </tr>





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
