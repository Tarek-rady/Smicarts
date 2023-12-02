<?php

namespace App\Http\Controllers\User;

use App\Exports\ServiceExport;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use Maatwebsite\Excel\Facades\Excel;


class ServicesController extends Controller
{

    public function index()
    {
        $id = auth('user')->user()->id;

        $services = Service::where('company_id' , $id)->orderBy('created_at', 'desc')->get();
        return view('backend.user.services.index' , compact('services'));
    }


    public function create()
    {
        $companies = Company::all();
        return view('backend.user.services.create' , compact('companies'));
    }


    public function store(ServiceRequest $request)
    {
        Service::create([
            'name' => ['ar' => $request->name , 'en' => $request->name_en] ,
            'price' => $request->price,
            'desc' => ['ar' => $request->desc , 'en' => $request->desc_en],
            'company_id' => auth('user')->user()->id
        ]);

        toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('services.index');
    }


    public function edit($id)
    {
        $service = Service::where('id' , $id)->first();
        $companies = Company::all();
        return view('backend.user.services.edit' , compact('service' , 'companies'));
    }


    public function update(ServiceRequest $request, $id)
    {
       $services = Service::findOrFail($id);
        $services->update([
            'name' => ['ar' => $request->name , 'en' => $request->name_en] ,
            'price' => $request->price,
            'desc' => ['ar' => $request->desc , 'en' => $request->desc_en],
            'company_id' => auth('user')->user()->id
        ]);

        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('services.index');
    }


    public function destroy($id)
    {
        Service::destroy($id);
            toastr()->success(trans('defult.date has been deleted successfully!'));
            return redirect()->route('services.index');
    }
}
