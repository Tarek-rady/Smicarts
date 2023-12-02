<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TermsAndCondationController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryByCategoryController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\AboutTheAppController;
use App\Http\Controllers\Api\CommunicationController;
use App\Http\Controllers\Api\ComplaintTypeController;
use App\Http\Controllers\Api\FavouriteController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Api\ApiRoutesController;
use App\Http\Controllers\Api\ReservationNotficationController;
use App\Http\Controllers\Api\paymentController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
   2|BgzjmcytysX5jUlULcG9d1SAD0ERzrNUFr71Boxy
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// 4|8QK4XL3PeBJGXpwvRCVj4fsweJPJdrdhDVyfo1F4
//
    Route::group(['middleware' => ['api' , 'lang'  ] ] , function(){

        Route::post('/save-token', [HomeController::class, 'saveToken'])->name('save-token')->middleware('auth:sanctum');

        // notfications

        // terms And Condation
        Route::group(['prefix' => 'terms'] , function(){
            Route::get('/' , [TermsAndCondationController::class , 'index']);
        });

        // categories
        Route::group(['prefix' => 'home'] , function(){
            Route::get('/' , [CategoryController::class , 'index']);
        });

        // Subcategories
        Route::group(['prefix' => 'category'] , function(){
            Route::get('/{category_id}' , [SubCategoryByCategoryController::class , 'show']);
        });

        // filter
        Route::post('filter' , [SubCategoryByCategoryController::class , 'filter']);

        //  companies
        Route::get('/companies/{id}' , [CompanyController::class , 'show']);

        // branches
        Route::get('company-branches/{company_id}' , [CompanyController::class , 'branches']);

        Route::get('cities' , [CompanyController::class , 'getCity']);

        //  complaints
        Route::group(['prefix' => 'report','middleware' => ['auth:sanctum' ]] , function(){
            Route::post('/' , [ComplaintController::class , 'store']);
        });

        //  Reservations
        Route::group(['prefix' => 'reservations', 'middleware' => 'auth:sanctum' ] , function(){
            Route::post('/create' , [ReservationController::class , 'store']);
            Route::get('/user/{user_id?}' , [ReservationController::class , 'getReservationUser']);
            Route::post('/status/{id}' , [ReservationController::class , 'ChangeStatuReservation']);
            Route::get('/{id}' , [ReservationController::class , 'show']);
        });

        //  setting
        Route::group(['prefix' => 'about'] , function(){
            Route::get('/' , [AboutTheAppController::class , 'index']);
        });

        //  complatintType
        Route::group(['prefix' => 'complaintType' , 'middleware' => 'auth:sanctum' ] , function(){
            Route::post('/store' , [ComplaintTypeController::class , 'store']);
            Route::get('/' , [ComplaintTypeController::class , 'index']);
        });

        //  Communication
        Route::group(['prefix' => 'contact-us'] , function(){
            Route::post('/create' , [CommunicationController::class , 'store']);
        });

        // favourites
        Route::group(['prefix' => 'favourites' , 'middleware' => 'auth:sanctum'] , function(){
            Route::get('/' , [FavouriteController::class , 'index']);
            Route::post('/create' , [FavouriteController::class , 'store']);
            Route::post('/{id}' , [FavouriteController::class , 'destroy']);

        });

        // notfication
        Route::group([ 'prefix' =>'notfications' , 'middleware' => 'auth:sanctum' ] , function(){
          Route::get('/' , [ReservationNotficationController::class , 'index']);
          Route::post('/delete/{id}' , [ReservationNotficationController::class , 'destroy']);
        });

        // ApiRoutes
        Route::get('/api-routes' , [ApiRoutesController::class , 'index']);


        Route::post('users/logout' , [UserController::class , 'logout'])->middleware(['auth:sanctum']);
        
                
        // payments
        Route::group(['prefix' => 'payments', 'middleware' => 'auth:sanctum'] , function(){
        
            Route::post('get_checkout_url' , [paymentController::class , 'get_checkout_url']);


        });
    });
    
                Route::get('payments/success' , [paymentController::class , 'success_payment']);
            Route::get('payments/failure' , [paymentController::class , 'failure_payment']);

    // Auth Users
    Route::group(['prefix' => 'users'] , function(){
        Route::post('/register' , [UserController::class , 'register']);
        Route::post('/login' , [UserController::class , 'login']);
        Route::post('/checkOtp' , [UserController::class , 'checkOtp']);
        Route::get('/getUser/{id}' , [UserController::class , 'getUser']);
        Route::post('/update/{id}' , [UserController::class , 'update']);
    });

