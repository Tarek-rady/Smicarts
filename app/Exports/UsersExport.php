<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection , WithHeadings
{

    public function headings(): array
    {
        return [
            '#' ,
            'Name' ,
            'Email' ,
            'Mobile'
        ];
    }
    public function collection()
    {
        return User::select( 'id' ,'name' , 'email'  ,'mobile')->get();
    }
}
