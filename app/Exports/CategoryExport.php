<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoryExport implements FromCollection, WithHeadings,WithMapping
{
     public function map($cat): array
    {
      return [
        $cat->id ,
        $cat->name ,
        $cat->color ,

      ];

    }
     public function headings(): array
    {
        return[
           '#' ,
           'Name' ,
           'Color'
        ];
    }
    public function collection()
    {
        return Category::select( 'id' , 'name' ,'color')->get();
    }
}
