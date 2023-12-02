<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReservationExport implements FromCollection, WithHeadings,WithMapping
{

     public function map($sub): array
    {
      return [
        $sub->id ,
        $sub->number_of_people ,
        $sub->branch->name ,
        $sub->desc ,
        $sub->status ,
        $sub->user->name ,
        $sub->company->name ,

      ];

    }
    public function headings(): array
    {
        return[
            '#' , 'Number Of People' , 'Branch' , 'Description' , 'Status' , 'User' , 'Company' 

        ];
    }
    public function collection()
    {
        return Reservation::select('id' , 'number_of_people','branch_id','desc',
        'status', 'user_id' , 'company_id' )->get();;
    }
}
