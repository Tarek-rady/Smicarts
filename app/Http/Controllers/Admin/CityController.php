<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CityExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::orderBy('id', 'DESC')->get();
        return view('backend.admin.cities.index' , compact('cities'));
    }





    public function store(CityRequest $request)
    {
        City::create([
            'name' => ['ar' => $request->name , 'en' => $request->name_en]
        ]);
        toastr()->success(trans('defult.date has been created successfully!'));
        return redirect()->route('cities.index');

    }




    public function update(CityRequest $request, $id)
    {
        $city = City::findOrfail($id);
        $city->update([
            'name' => ['ar' => $request->name , 'en' => $request->name_en]
        ]);
        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('cities.index');
    }


    public function destroy($id)
    {
        City::destroy($id);
        toastr()->success(trans('defult.date has been deleted successfully!'));
        return redirect()->route('cities.index');
    }

    public function export()
    {
        return Excel::download(new CityExport, 'City.xlsx');
    }
}
