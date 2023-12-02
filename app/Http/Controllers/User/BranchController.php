<?php

namespace App\Http\Controllers\User;

use App\Exports\BranchsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BranchController extends Controller
{

    public function index()
    {
        $user = auth('user')->user()->id;
        $branches = Branch::orderBy('id', 'DESC')->where('company_id' , $user)->get();
        return view('backend.user.branches.index' , compact('branches'));
    }


    public function create()
    {
        return view('backend.user.branches.create');
    }


    public function store(BranchRequest $request)
    {
         $request_date = $request->except('name_en');
         $request_date['name'] = ['ar' => $request->name , 'en' => $request->name_en];
         $request_date['company_id'] = auth('user')->user()->id;
         Branch::create($request_date);
         toastr()->success(trans('defult.date has been created successfully!'));
         return redirect()->route('branches.index');


    }



    public function edit($id)
    {
        $branch = Branch::where('id' , $id)->first();
        return view('backend.user.branches.edit' , compact('branch'));
    }


    public function update(BranchRequest $request, $id)
    {
        $branch = Branch::where('id' , $id)->first();

         $request_date = $request->except('name_en');
         $request_date['name'] = ['ar' => $request->name , 'en' => $request->name_en];
         $request_date['company_id'] = auth('user')->user()->id;

         $branch->update($request_date);

         toastr()->success(trans('defult.date has been updated successfully!'));
         return redirect()->route('branches.index');

    }


    public function destroy($id)
    {
        Branch::destroy($id);

        toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('branches.index');
    }

    public function export()
    {
        return Excel::download(new BranchsExport, 'Branchs.xlsx');
    }
}
