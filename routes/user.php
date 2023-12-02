<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\BranchController;
use App\Http\Controllers\User\CompanyBannerController;
use App\Http\Controllers\User\ReservationController;
use App\Http\Controllers\User\ServicesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){




        Route::group([ 'middleware' => 'auth:user' ,  'prefix' => 'admin-company' ] , function(){

            // dashboard
            Route::get('/dashboard' , [DashboardController::class , 'index'])->name('user-dashboard');


            // company Banners
            Route::resource('/company-banners' , CompanyBannerController::class);

            // services
            Route::resource('/services' , ServicesController::class);

            // reservations
            Route::get('/reservations-company' , [ReservationController::class , 'index'])->name('reservations-company');
            Route::put('/update-reservations/{id}' , [ReservationController::class , 'update_status'])->name('update-reservations');
            Route::get('/reservation-details/{id}' , [ReservationController::class , 'details'])->name('reservation-details');


            // complaints
            Route::get('/complaints-company' , [ReservationController::class , 'complaints'])->name('complaints-company');

            // company Details
            Route::get('/company-details' , [ReservationController::class , 'company_details'])->name('company-details');
            Route::get('/company-edit/{id}' , [ReservationController::class , 'edit'])->name('companyedit');
            Route::put('/company-update/{id}' , [ReservationController::class , 'update'])->name('company-update');
            // branches
            Route::resource('branches', BranchController::class);



            // Exports
            Route::get('/company-reservation-export', [ReservationController::class, 'export'])->name('company-reservation-export');
            Route::get('/company-banners-export', [CompanyBannerController::class, 'export'])->name('company-banners-export');
            Route::get('/branches-export', [BranchController::class, 'export'])->name('branches-export');
            Route::get('/company-complaints-export', [ReservationController::class, 'complaintexport'])->name('company-complaints-export');







        });





});
