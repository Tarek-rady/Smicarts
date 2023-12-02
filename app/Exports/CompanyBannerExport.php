<?php

namespace App\Exports;

use App\Models\CompanyBanner;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CompanyBannerExport implements FromCollection, WithHeadings,WithMapping
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
        $id = auth('user')->user()->id;
        
        $banners = CompanyBanner::where('company_id', $id)->orderBy('created_at', 'desc')
        ->select( 'id' ,'name' ,'url' , 'company_id')->get();

        return  $banners;
    }
}
