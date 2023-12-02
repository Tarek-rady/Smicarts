<?php

namespace App\Exports;

use App\Models\CategoryBanner;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoryBannerExport implements FromCollection, WithHeadings,WithMapping
{

    public function map($category): array
    {
      return [
        $category->id ,
        $category->name ,
        $category->url ,
        $category->category->name ,
        $category->company->name ,

      ];

    }
     public function headings(): array
    {
        return[
           '#' ,
           'Name' ,
           'URL' ,
           'Category' ,
           'Company' ,
        ];
    }
    public function collection()
    {
        return CategoryBanner::select('id', 'name','url','category_id' , 'company_id')->get();
    }
}
