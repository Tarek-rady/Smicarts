<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\BannersExport;

use Maatwebsite\Excel\Facades\Excel;


class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::orderBy('id', 'DESC')->get();
        return view('backend.admin.banners.index' , compact('banners'));
    }


    public function create()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('backend.admin.banners.create' , compact('companies'));
    }


    public function store(BannerRequest $request)
    {
        $request_data = $request->except('name_en');


        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/banners/'), $file_name);
            $request_data['img'] = $file_name;
        }
        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];
        $banner = Banner::create($request_data);

        toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('banners.index');
    }




    public function edit($id)
    {
        $banner = Banner::findOrfail($id);
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('backend.admin.banners.edit' , compact( 'banner' ,'companies'));
    }


    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::findOrfail($id);
        $request_data = $request->except('name_en');
        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];

        $banner->update($request_data);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $banner->img;
            $banner->img = $new_file_name ;
            Storage::disk('banners')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/banners/'), $new_file_name);
        }

        $banner->save();
        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('banners.index');

    }


    public function destroy($id)
    {

        $banner = Banner::where('id' , $id)->first();


        $old_file_name = $banner->img;

        if (!empty($banner->name)) {

            Storage::disk('banners')->delete($banner->id);
        }
        Banner::destroy($id);

        toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('banners.index');
    }

    public function export()
    {
        return Excel::download(new BannersExport, 'Banner.xlsx');
    }
}
