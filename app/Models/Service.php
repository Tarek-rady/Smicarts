<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory , HasTranslations;

    protected $table='services';
    protected $guarded=[];
    public $translatable = ['name' , 'desc' ];

     // function get company
     public function company()
     {
         return $this->belongsTo(Company::class , 'company_id');
     }

     // function get reservations
     public function reservations()
     {
         return $this->belongsToMany(Reservation::class , 'reservation_services','service_id','reservation_id');
     }

}
