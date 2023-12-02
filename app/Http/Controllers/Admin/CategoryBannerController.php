<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBannerRequest;
use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Exports\CategoryBannerExport;
use Maatwebsite\Excel\Facades\Excel;

class CategoryBannerController extends Controller
{

    public function index()
    {
        $banners = CategoryBanner::orderBy('id', 'DESC')->get();
        return view('backend.admin.category-banners.index' , compact('banners'));
    }


    public function create()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.admin.category-banners.create' , compact('companies' , 'categories'));
    }


    public function store(CategoryBannerRequest $request)
    {
        $request_data = $request->except('name_en');
        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/category-banners/'), $file_name);
             $request_data['img'] = $file_name;

        }

        $banner = CategoryBanner::create($request_data);

        toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('category-banners.index');
    }




    public function edit($id)
    {
        $banner = CategoryBanner::findOrfail($id);
        $companies = Company::orderBy('id', 'DESC')->get();
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('backend.admin.category-banners.edit' , compact( 'banner' ,'companies' , 'categories'));
    }


    public function update(CategoryBannerRequest $request, $id)
    {
        $banner = CategoryBanner::findOrfail($id);
        $request_data = $request->except('name_en');
        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];

        $banner->update($request_data);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $banner->img;
            $banner->img = $new_file_name ;
            Storage::disk('category-banners')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/category-banners/'), $new_file_name);
        }

        $banner->save();
        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('category-banners.index');

    }


    public function destroy($id)
    {

        $banner = CategoryBanner::where('id' , $id)->first();


        $old_file_name = $banner->img;

        if (!empty($banner->name)) {

            Storage::disk('category-banners')->delete($banner->id);
        }
        CategoryBanner::destroy($id);

        toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('category-banners.index');
    }

    public function export()
    {
        return Excel::download(new CategoryBannerExport, 'CategoryBanner.xlsx');
    }
}
