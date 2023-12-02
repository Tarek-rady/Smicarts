<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table='complaints';
    protected $guarded=[];

    // function get company
    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }

    // function get company
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
