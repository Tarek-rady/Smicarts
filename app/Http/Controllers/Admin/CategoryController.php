<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CategoryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.admin.categories.index' , compact('categories'));
    }


    public function create()
    {
        return view('backend.admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        $request_data = $request->except('name_en');
        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/categories/'), $file_name);
            $request_data['img'] = $file_name;
        }

        Category::create($request_data);


        toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('categories.index');
    }



    public function edit($id)
    {

        $category = Category::findOrfail($id);
        return view('backend.admin.categories.edit' , compact('category'));


    }


    public function update(CategoryRequest $request, $id)
    {
        $request_data = $request->except('name_en');

        $category = Category::findOrfail($id);
        $request_data['name'] = ['ar' => $request->name , 'en' => $request->name_en];
        $category->update($request_data);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $category->img;
            $category->img = $new_file_name ;
            Storage::disk('categories')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/categories/'), $new_file_name);
        }

        $category->save();
        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        $category = Category::where('id' , $id)->first();


        $old_file_name = $category->img;

        if (!empty($category->name)) {

            Storage::disk('categories')->delete($category->id);
        }
        Category::destroy($id);
        toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('categories.index');
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'Category.xlsx');
    }
}
