<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomended extends Model
{
    use HasFactory;

    protected $table='recomendeds';
    protected $guarded=[];


    // function get company
    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }
}
