<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory , HasTranslations;

    protected $table='categories';
    protected $guarded=[];
    public $translatable = ['name'];

    // function Get Banners
    public function banners()
    {
        return $this->hasMany(CategoryBanner::class);
    }
}
