<?php

namespace App\Http\Controllers\User;

use App\Exports\CompanyBannerExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyBannerRequest;
use App\Models\Company;
use App\Models\CompanyBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CompanyBannerController extends Controller
{

    public function index()
    {

        $user = auth('user')->user()->id;
        $banners = CompanyBanner::orderBy('id', 'DESC')->where('company_id' , $user)->get();
        return view('backend.user.banners.index' , compact('banners'));
    }


    public function create()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('backend.user.banners.create' , compact('companies'));
    }


    public function store(CompanyBannerRequest $request)
    {
        $request_data = $request->except('name_en');
        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];
        $request_data['company_id'] = auth('user')->user()->id;

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/companyBanners/'), $file_name);
            $request_data['img'] = $file_name;
        }

        $banner = CompanyBanner::create($request_data);

        toastr()->success('Banner has been deleted successfully!');
        return redirect()->route('company-banners.index');
    }


    public function edit($id)
    {
        $banner = CompanyBanner::findOrfail($id);
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('backend.user.banners.edit' , compact( 'banner' ,'companies'));
    }


    public function update(CompanyBannerRequest $request, $id)
    {
        $banner = CompanyBanner::findOrfail($id);
        $request_data = $request->except('name_en');
        $request_data['company_id'] = auth('user')->user()->id;

        $banner->update($request_data);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $banner->img;
            $banner->img = $new_file_name ;
            Storage::disk('company-banners')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/companyBanners/'), $new_file_name);
        }

        $banner->save();
        toastr()->success('Banner has been deleted successfully!');
        return redirect()->route('company-banners.index');

    }


    public function destroy($id)
    {

        $banner = CompanyBanner::where('id' , $id)->first();


        $old_file_name = $banner->img;

        if (!empty($banner->name)) {

            Storage::disk('company-banners')->delete($banner->id);
        }
        CompanyBanner::destroy($id);

        toastr()->success('Banner has been deleted successfully!');
        return redirect()->route('company-banners.index');
    }

    public function export()
    {
        return Excel::download(new CompanyBannerExport, 'CompanyBanner.xlsx');
    }
}
