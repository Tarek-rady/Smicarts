<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CompanyBanner extends Model
{
    use HasFactory ,HasTranslations ;

    protected $table='company_banners';
    protected $guarded=[];
    public $translatable = ['name'];
    protected $appends = ['banner_type'];

    public function getBannerTypeAttribute()
    {
        return 'company_banners';

    }




    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }

}
