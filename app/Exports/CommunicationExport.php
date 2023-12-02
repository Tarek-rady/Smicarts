<?php

namespace App\Exports;

use App\Models\Communication;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CommunicationExport implements FromCollection, WithHeadings,WithMapping
{

    public function map($row): array
    {
      return [
        $row->id ,
        $row->name ,
        $row->mobile ,
        $row->message ,
        $row->complaint_type ,

      ];

    }
     public function headings(): array
    {
        return[
           '#' ,
           'Name' ,
           'Mobile' ,
           'Message' ,
           'Complaint Type'
        ];
    }
    public function collection()
    {
        return Communication::select( 'id' , 'name','mobile','message','complaint_type')->get();
    }
}
