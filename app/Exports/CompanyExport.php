<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CompanyExport implements FromCollection, WithHeadings,WithMapping
{
     public function map($sub): array
    {
      return [
        $sub->id ,
        $sub->company_name ,
        $sub->name ,
        $sub->email ,
        $sub->desc ,
        $sub->location ,
        $sub->city->name ,
        $sub->category->name ,
        $sub->subCategory->name ,

      ];

    }
    public function headings(): array
    {
        return[
           '#' ,
           'Name' ,
           'Admin Name' ,
           'Email' ,
           'Description' ,
           'Location' ,
           'City' ,
           'Category' ,
           'SubCategory'
        ];
    }
    public function collection()
    {
        return Company::select(
        'id' ,
        'company_name' ,
        'name' ,
        'email' ,
        'desc' ,
        'location' ,
        'city_id' ,
        'category_id' ,
        'subcategory_id' ,
        )->get();
    }
}
