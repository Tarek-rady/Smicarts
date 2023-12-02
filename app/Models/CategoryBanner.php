<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CategoryBanner extends Model
{
    use HasFactory , HasTranslations;

    protected $table='category_banners';
    protected $guarded=[];
    public $translatable = ['name'];
    protected $appends = ['banner_type'];



    // function get Category
    public function category()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }

    // function get banner
    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }

    public function getBannerTypeAttribute()
    {
        return 'category_banners';

    }

}
