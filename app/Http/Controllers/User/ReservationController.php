<?php

namespace App\Http\Controllers\User;

use App\Exports\ComplaintCompanyExport;
use App\Exports\ReservationCompanyExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Complaint;
use App\Models\Reservation;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ReservationController extends Controller
{
    public function index()
    {
        $user = auth('user')->user()->id;

        $reservations = Reservation::orderBy('id', 'DESC')->where('company_id' , $user)->get();
        return view('backend.user.reservations.index' , compact('reservations') );
    }

    public function complaints()
    {
        $user = auth('user')->user()->id;
        $complaints = Complaint::orderBy('id', 'DESC')->where('company_id' , $user)->get();
        return view('backend.user.complaints.index' , compact('complaints'));
    }

    public function company_details()
    {
        $id = auth('user')->user()->id;
        $companies = Company::where('id' , $id)->orderBy('created_at', 'desc')->get();
        return view('backend.user.companies.index' , compact('companies'));
    }

    public function edit($id)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $sub_categories = SubCategory::orderBy('id', 'DESC')->get();
        $cities = City::orderBy('id', 'DESC')->get();
        $company = Company::findOrfail($id);
        return view('backend.user.companies.edit' , compact( 'company' ,'categories' , 'sub_categories' , 'cities'));
    }

    public function update_status($id , Request $request)
    {
        $reserevsion = Reservation::where('id' , $id)->first();
        $reserevsion->update(['status' => $request->status]);
        toastr()->success('Status has been update successfully!');
        return redirect()->route('reservations-company');
    }

     public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrfail($id);
        $request_data = $request->except(['company_name_en' , 'desc_en']);
         $request_data['company_name'] = ['ar' => $request->company_name , 'en' => $request->company_name_en];
        $request_data['desc'] = ['ar' => $request->desc , 'en' => $request->desc_en];

        $request_data['password'] = bcrypt($request->password);
        $request_data['email_verified_at'] = now();
        $request_data['remember_token'] = Str::random(10);
        $company->update($request_data);


        if ($request->hasFile('icon')) {
            $icon = $request->file('icon')->getClientOriginalName();
            $old_file_name = $company->icon;
            $company->icon = $icon ;
            Storage::disk('icon')->delete('/'.$old_file_name);
            $request->icon->move(public_path('/Attachments/companies/icon/'), $icon);
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->getClientOriginalName();
            $old_file_name = $company->cover;
            $company->cover = $cover ;
            Storage::disk('cover')->delete('/'.$old_file_name);
            $request->cover->move(public_path('/Attachments/companies/cover/'), $cover);
        }

        $company->save();

        toastr()->success('Company has been update successfully!');
        return redirect()->route('company-details');
    }


    public function export()
    {
        return Excel::download(new ReservationCompanyExport, 'ReservationCompany.xlsx');
    }

    public function complaintexport()
    {
        return Excel::download(new ComplaintCompanyExport, 'ComplaintCompany.xlsx');
    }
    
    public function details($id)
    {
        $reservation = Reservation::where('id' , $id)->first();
        return view('backend.user.reservations.details' , compact('reservation'));

    }





}
