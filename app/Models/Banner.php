<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Banner extends Model
{
    use HasFactory , HasTranslations;

    protected $table='banners';
    protected $guarded=[];
    public $translatable = ['name'];
    protected $appends = ['banner_type'];

    // company
    public function company()
    {
       return $this->belongsTo(Company::class , 'company_id');
    }


    public function getBannerTypeAttribute()
    {
        return 'Banners';

    }
}
