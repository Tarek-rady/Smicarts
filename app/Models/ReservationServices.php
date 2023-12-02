<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationServices extends Model
{
    use HasFactory;

    protected $table='reservation_services';
    protected $guarded=[];
}
