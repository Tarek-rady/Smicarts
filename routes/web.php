<?php

use App\Http\Controllers\Admin\ApiRouteController;
use App\Http\Controllers\Admin\ApoutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryBannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\RecomendedController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/


Route::group(
    [


    ], function(){

        // welcome - Home page
        Route::get('/' , [DashboardController::class , 'welcome']);


        Route::group([ 'middleware' => 'auth:admin' ,  'prefix' => 'admin' ] , function(){


            //Home Dashboard
            Route::get('/dashboard' , [DashboardController::class , 'index'])->name('dashboard');

            // users
            Route::resource('/users' , UserController::class);

            //banners
            Route::resource('/banners' , BannerController::class);

            //categoryBanners
            Route::resource('/category-banners' , CategoryBannerController::class );

            //categories
            Route::resource('/categories' , CategoryController::class);

            // cities
            Route::resource('/cities' , CityController::class);

            // sub categories
            Route::resource('/sub-categories' , SubCategoryController::class);

            // companies
            Route::resource('/companies' , CompanyController::class);

            //company wallet

            Route::get('companies/{company}/wallet', [WalletController::class, 'index'])->name('companies.wallet.index');
            Route::get('companies/{company}/wallet/create', [WalletController::class, 'create'])->name('companies.wallet.create');
            Route::post('companies/{company}/wallet/store', [WalletController::class, 'store'])->name('companies.wallet.store');



            // get subcategory
            Route::get('/subcategory-category/{id}' , [CompanyController::class , 'get_subCategory']);

            // complaints
            Route::get('/complaints' , [ComplaintController::class , 'index'])->name('complaints');

            // Reservations
            Route::get('/reservations' , [ReservationController::class , 'index'])->name('reservations');



            // contact-us
            Route::get('/contact-us' , [ContactController::class , 'index'])->name('contact-us');

            //news
            Route::resource('/news' , NewsController::class);


            // settings

            // terms
            Route::get('/terms/{id}' , [SettingController::class , 'index'])->name('terms');
            Route::post('/update-terms/{id}' , [SettingController::class , 'update_terms'])->name('update-terms');
            // apout the app
            Route::get('/about-app/{id}' , [SettingController::class , 'about'])->name('about-app');
            Route::post('/update-about-app/{id}' , [SettingController::class , 'update_about'])->name('update-about-app');

            // api routes
            Route::get('/api-route/{id}' , [SettingController::class , 'api_route'])->name('api-route');
            Route::post('/update-api-route/{id}' , [SettingController::class , 'update_api_route'])->name('update-api-route');


            // recomended
            Route::resource('/recomended' , RecomendedController::class);



            // Exports
            Route::get('users-export', [UserController::class, 'export'])->name('users-export');
            Route::get('/banners-export', [BannerController::class, 'export'])->name('banners-export');
            Route::get('/category-banners-export', [CategoryBannerController::class, 'export'])->name('category-banners-export');
            Route::get('/company-banners-export', [CompanyBannerController::class, 'export'])->name('company-banners-export');

            Route::get('/categories-export', [CategoryController::class, 'export'])->name('categories-export');
            Route::get('/cities-export', [CityController::class, 'export'])->name('cities-export');
            Route::get('/sub-categories-export', [SubCategoryController::class, 'export'])->name('sub-categories-export');
            Route::get('/companies-export', [CompanyController::class, 'export'])->name('companies-export');
            Route::get('/complaints-export', [ComplaintController::class, 'export'])->name('complaints-export');
            Route::get('/reservations-export', [ReservationController::class, 'export'])->name('reservations-export');
            Route::get('/contact-us-export', [ContactController::class, 'export'])->name('contact-us-export');
            Route::get('/recomended-export', [RecomendedController::class, 'export'])->name('recomended-export');







        });

});



require __DIR__.'/auth.php';
