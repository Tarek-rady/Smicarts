<?php

namespace App\Exports;

use App\Models\SubCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class SubCategoryExport implements FromCollection, WithHeadings ,WithMapping
{

     public function map($sub): array
    {
      return [
        $sub->id ,
        $sub->name ,
        $sub->color ,
        $sub->category->name ,

      ];

    }
     public function headings(): array
    {
        return[
           '#' , 'Name' , 'Color' , 'Category'
        ];
    }
    public function collection()
    {
        return SubCategory::with('category')->select('id' , 'name' , 'color' , 'category_id')->get();
    }
}
