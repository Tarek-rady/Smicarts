<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CompanyExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('backend.admin.companies.index' , compact('companies'));
    }


    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $sub_categories = SubCategory::orderBy('id', 'DESC')->get();
        $cities = City::orderBy('id', 'DESC')->get();

        return view('backend.admin.companies.create' , compact('categories' , 'sub_categories' , 'cities'));
    }


    public function store(CompanyRequest $request)
    {
        $request_data = $request->except(['company_name_en' , 'desc_en']);
         $request_data['company_name'] = ['ar' => $request->company_name , 'en' => $request->company_name_en];
        $request_data['desc'] = ['ar' => $request->desc , 'en' => $request->desc_en];

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $icon = $image->getClientOriginalName();
            $request->icon->move(public_path('/Attachments/companies/icon/'), $icon);
            $request_data['icon'] = $icon;
        }

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $cover = $image->getClientOriginalName();
            $request->cover->move(public_path('/Attachments/companies/cover/'), $cover);
            $request_data['cover'] = $cover;
        }
        if(isset($request->password) && $request->password != null)
            $request_data['password'] = bcrypt($request->password);
        $request_data['email_verified_at'] = now();
        $request_data['remember_token'] = Str::random(10);
        Company::create($request_data);
        toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('companies.index');



    }


    public function edit($id)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $sub_categories = SubCategory::orderBy('id', 'DESC')->get();
        $cities = City::orderBy('id', 'DESC')->get();
        $company = Company::findOrfail($id);
        return view('backend.admin.companies.edit' , compact( 'company' ,'categories' , 'sub_categories' , 'cities'));
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

        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('companies.index');
    }


    public function destroy($id)
    {
        $company = Company::where('id' , $id)->first();


        $old_file_name = $company->icon;

        if (!empty($company->company_name)) {

            Storage::disk('icon')->delete($old_file_name);
        }

        Company::destroy($id);

        toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('companies.index');
    }

    public function get_subCategory($id)
    {
       $subCategories = SubCategory::where('category_id' , $id)->pluck('name' , 'id');
       return $subCategories;
    }

    public function export()
    {
        return Excel::download(new CompanyExport, 'Company.xlsx');
    }
}
