<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubCategoryExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SubCategoryController extends Controller
{

    public function index()
    {
       $sub_categories = SubCategory::orderBy('id', 'DESC')->get();
       return view('backend.admin.sub-categories.index' , compact('sub_categories'));

    }


    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.admin.sub-categories.create' , compact('categories'));
    }


    public function store(Request $request)
    {
        $request_data = $request->except('name_en');
        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/subCategories/'), $file_name);
            $request_data['img'] = $file_name;
        }

        SubCategory::create($request_data);


       toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('sub-categories.index');
    }



    public function edit($id)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $sub_category = SubCategory::findOrfail($id);
        return view('backend.admin.sub-categories.edit' , compact('categories' , 'sub_category'));
    }


    public function update(Request $request, $id)
    {
        $sub_category = SubCategory::findOrfail($id);
        $request_data = $request->except('name_en');


        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];
        $sub_category->update($request_data);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $sub_category->img;
            $sub_category->img = $new_file_name ;
            Storage::disk('sub-categories')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/subCategories/'), $new_file_name);
        }

        $sub_category->save();
        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('sub-categories.index');
    }


    public function destroy($id)
    {
        $sub_category = SubCategory::findOrfail($id);
        $old_file_name = $sub_category->img;

        if (!empty($sub_category->name)) {

            Storage::disk('categories')->delete($sub_category->id);
        }
        SubCategory::destroy($id);
        toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('sub-categories.index');
    }

    public function export()
    {
        return Excel::download(new SubCategoryExport, 'SubCategory.xlsx');
    }
}
