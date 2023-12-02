<?php

namespace App\Exports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CityExport implements FromCollection, WithHeadings,WithMapping
{

     public function map($city): array
    {
      return [
        $city->id ,
        $city->name ,
       

      ];

    }
    public function headings(): array
    {
        return[
          '#' ,
          'Name'
        ];
    }
    public function collection()
    {
        return City::select('id' ,'name')->get();
    }
}
