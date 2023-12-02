<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Http\Requests\TermsRequest;
use App\Models\ApiRoute;
use App\Models\ApoutThaApp;
use App\Models\TermsAndCondation;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index($id)
    {
        $terms = TermsAndCondation::where('id' , $id )->first();
        if($terms){
          return view('backend.admin.settings.terms' , compact('terms'));
        }else{
            toastr()->error('Defult Page');
            return redirect()->route('dashboard');
        }
    }

    public function update_terms(TermsRequest $request , $id)
    {
       $terms = TermsAndCondation::findOrfail($id);
       $terms->update([
        'desc' => ['ar' => $request->desc , 'en' => $request->desc_en]
        ]);

       toastr()->success(trans('defult.date has been updated successfully!'));
       return redirect()->route('terms' , 1);
    }

    public function about($id)
    {

        $about = ApoutThaApp::where('id' , $id)->first();

        if($about){
            return view('backend.admin.settings.about' , compact('about'));
        }else{
            toastr()->error('Defult Page');
            return redirect()->route('dashboard');
        }
    }

    public function update_about($id , AboutRequest $request)
    {
        $about = ApoutThaApp::where('id' , $id)->first();
        $about->update([
           'desc' => ['ar' => $request->desc , 'en' => $request->desc_en] ,
           'title' => ['ar' => $request->title , 'en' => $request->title_en] ,
        ]);

        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('about-app' , 1);
    }


    public function api_route($id)
    {
        $apis = ApiRoute::where('id' , $id)->first();
        if($apis){
            return view('backend.admin.settings.api-route' , compact('apis'));
        }else{
            toastr()->error('Defult Page');
            return redirect()->route('dashboard');
        }
    }

    public function update_api_route($id , Request $request)
    {
        $apis = ApiRoute::where('id' , $id)->first();
        $apis->update($request->all());
        toastr()->success(trans('defult.date has been updated successfully!'));
        return redirect()->route('api-route' , 1);
    }



}
