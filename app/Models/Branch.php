<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Branch extends Model
{
    use HasFactory , HasTranslations;

    protected $table='branches';
    protected $guarded=['icon'];
    public $translatable = ['name'];

    public function company()
    {
       return $this->belongsTo(Company::class , 'company_id');
    }
}
