<?php

namespace App\Exports;

use App\Models\Recomend;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RecomendExport implements FromCollection, WithHeadings,WithMapping
{
     public function map($sub): array
    {
      return [
        $sub->id ,
        $sub->company->name ,


      ];

    }
    public function headings(): array
    {
        return[
            '#' ,
            'Company'
        ];
    }
    public function collection()
    {
        return Recomend::select('id' , 'company_id')->get();
    }
}
