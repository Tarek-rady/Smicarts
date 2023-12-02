@extends('layouts.backend.master')

@section('title')
 Company Wallet
@endsection


@section('style')

@endsection

@section('content')

<div class="row">
      <div class="card mb-5 mb-xl-8">
          <!--begin::Header-->
          <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">Wallet</span>
            </h3>
            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a company">
                <a href="{{ route('companies.wallet.create', $company->id) }}" class="btn btn-primary">
                    <span><i class="fa fa-plus"></i></span>
                    <span> إضافة عملية سحب </span>
                </a>
            </div>
          </div>
          <!--end::Header-->
          <div class="col-md-12" >
              <div class="wallet_amount" style="text-align: center">
                  <p style="font-size: 3rem; font-weight:bold"><span>{{$balance}}</span> ريال</p>
                  <p style="font-size: 1.3rem;">الرصيد الحالي</p>
              </div>
          </div>
          <div class="col-md-12">
            <div class="card-body py-3">
              <div class="table-responsive" id="buttons">
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                  <tbody style="text-align: center">
                     
                    @if(! $company_wallet_operations )
                        <span style="display:block;text-align: center">Ther is no operation</span>
                    @else
                        @foreach ($company_wallet_operations as $company_wallet_operation)
    
                          <tr >
    
                            @if ($company_wallet_operation->credit)
                                                        
                                <td><i class="fa fa-arrow-alt-circle-up fa-x" style="color: green"></i></td>
                                <td style="color: green">{{ ' تم إيداع '   . $company_wallet_operation->credit . ' ريال '}}</td>
    
                            @else 
    
                                <td><i class="fa fa-arrow-alt-circle-down" style="color: red"></i></td>
                                <td style="color: red">{{ ' تم سحب '  . $company_wallet_operation->debit . ' ريال'}}</td>
    
                            @endif
    
                            <td>{{date('Y-m-d h:i',strtotime($company_wallet_operation->created_at))}}</td>
    
    
                          </tr>
    
                        @endforeach
                    @endif

                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
  </div>
        
@endsection

@section('script')

@endsection