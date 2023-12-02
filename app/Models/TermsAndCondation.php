<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class TermsAndCondation extends Model
{
    use HasFactory , HasTranslations;

    protected $table='terms_and_condations';
    protected $guarded=[];
    public $translatable = ['desc'];
}
