<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Translatable\HasTranslations;

class Company extends Authenticatable
{
    use  HasFactory, Notifiable , HasApiTokens , HasTranslations ;

    protected $table='companies';
    protected $guarded=[];
    protected $appends = ['is_favourite'];
    public $translatable = ['company_name' , 'desc'];

    // function get city
    public function city()
    {
        return $this->belongsTo(City::class , 'city_id');
    }

    // function get category
    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    // function get subcategory
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class , 'subcategory_id');
    }

    // function get banners
    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    // function Get services
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    // function Get services
    public function reservatios()
    {
        return $this->hasMany(Reservation::class);
    }

    // get banners
    public function companybanners()
    {
        return $this->hasMany(CompanyBanner::class) ;
    }

    // function get branches
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
    
    public function wallet()
    {
        return $this->hasMany(Wallet::class);
    }
    

    public function getIsFavouriteAttribute()
    {
           $companies = Company::select('id')->get();

           foreach ($companies as $company) {

            $id = $company->id;

           }

            $is_favourite = Favourite::where('company_id' , $this->id)->first();

            if($is_favourite){
                 return true;
            }else{
                return false ;
            }



    }













    protected $hidden = [
        'remember_token',
        'password'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
