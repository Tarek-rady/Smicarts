<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table='reservations';
    protected $guarded=[];

    // function get branch
    public function branch()
    {
       return $this->belongsTo(Branch::class , 'branch_id');
    }

    // function get User
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

     // function get company
     public function company()
     {
         return $this->belongsTo(Company::class , 'company_id');
     }


    // function get services
    public function services()
    {
        return $this->belongsToMany(Service::class , 'reservation_services','reservation_id','service_id');
    }

}
