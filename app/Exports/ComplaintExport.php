<?php

namespace App\Exports;

use App\Models\Complaint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ComplaintExport implements FromCollection, WithHeadings,WithMapping
{
    public function map($sub): array
    {
      return [
        $sub->id ,
        $sub->company->name ,
        $sub->message ,
        $sub->user->name ,

      ];

    }
    public function headings(): array
    {
        return[
             '#' ,
             'Company' ,
             'Message' ,
             'User'
        ];
    }
    public function collection()
    {
        return Complaint::select('id' , 'company_id','message','user_id')->get();
    }
}
