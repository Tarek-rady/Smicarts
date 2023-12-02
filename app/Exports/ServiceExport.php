<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ServiceExport implements FromCollection, WithHeadings,WithMapping
{

 public function map($sub): array
    {
      return [
        $sub->id ,
        $sub->name ,
        $sub->price ,
        $sub->desc ,
        $sub->company->name

      ];

    }
    public function headings(): array
    {
        return[
            '#' , 'Name' , 'Price' , 'Description' , 'Company'
        ];
    }
    public function collection()
    {
        $id = auth('admin-company')->user()->id;
        $services = Service::where('company_id' , $id)->orderBy('created_at', 'desc')
        ->select( 'id' , 'name','price','desc', 'company_id')->get();

        return $services;
    }
}
