<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Branch;
use App\Models\Category;
use App\Models\CategoryBanner;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyBanner;
use App\Models\Complaint;
use App\Models\Reservation;
use App\Models\SubCategory;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        if(auth('admin')->check()){

            $users = User::count();
            $companies = Company::count();
            $banners = Banner::count();

            $categories = Category::count();
            $subCategories = SubCategory::count();
            $complaints = Complaint::count();

            $reservations = Reservation::count();
            $categoryBanners = CategoryBanner::count();
            $cities = City::count();







            return view('backend.dashboard' , compact('users' ,'companies' ,'banners' ,'categories' ,'subCategories' ,
                'complaints' ,'reservations' ,'categoryBanners' ,'cities' ,)
            );
        }else{
            $user = auth('user')->user()->id;

            $company_banners = CompanyBanner::where('company_id' , $user)->count();
            $branches = Branch::where('company_id' , $user)->count();
            $complaints = Complaint::where('company_id' , $user)->count();

            $reservations = Reservation::where('company_id' , $user)->count();
            $reservations_complete = Reservation::where('status' , '=' , 'complete')->where('company_id' , $user)->count();
            $reservations_canceled = Reservation::where('status' , '=' , 'canceled')->where('company_id' , $user)->count();



            return view('backend.dashboard' , compact('company_banners' ,'branches' ,'complaints' ,
                  'reservations' ,'reservations_complete' ,'reservations_canceled'
            ));

        }

    }


    public function welcome()
    {
        return view('welcome');
    }
}
