<?php

namespace App\Http\Controllers\Admin;

use App\Exports\RecomendExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecomendedRequest;
use App\Models\Company;
use App\Models\Recomended;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RecomendedController extends Controller
{

    public function index()
    {
        $recomended = Recomended::orderBy('id', 'DESC')->get();
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('backend.admin.recomended.index' , compact('recomended' , 'companies'));
    }





    public function store(RecomendedRequest $request)
    {
        Recomended::create($request->all());
       toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('recomended.index');
    }





    public function update(RecomendedRequest $request, $id)
    {
        $recomended = Recomended::findOrfail($id);
        $recomended->update($request->all());
       toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('recomended.index');

    }


    public function destroy($id)
    {
        Recomended::destroy($id);
       toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('recomended.index');
    }

    public function export()
    {
        return Excel::download(new RecomendExport, 'Recomended.xlsx');
    }
}
