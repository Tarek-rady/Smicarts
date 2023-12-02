<?php

namespace App\Exports;

use App\Models\Banner;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BannersExport implements FromCollection , WithHeadings,WithMapping
{

    public function map($banner): array
    {
      return [
        $banner->id ,
        $banner->name ,
        $banner->url ,
        $banner->company->name ,

      ];

    }

    public function headings(): array
    {
        return[
            '#' ,
            'Name' ,
            'URL' ,
            'Company' ,
        ];
    }


    public function collection()
    {
        return Banner::select('id' , 'name' ,'url','company_id' )->get();
    }
}
