<?php

namespace App\Exports;

use App\Models\Branch;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BranchsExport implements FromCollection , WithHeadings,WithMapping
{

    public function map($branch): array
    {
      return [
        $branch->id ,
        $branch->name ,
        $branch->location ,
        $branch->company->name ,

      ];

    }
    public function headings(): array
    {
        return[
           '#' ,
           'Name' ,
           'Location' ,
           'Company'
        ];
    }
    public function collection()
    {
        $id = auth('user')->user()->id;
        $branches = Branch::where('company_id' , $id)->orderBy('created_at', 'desc')->select('id' ,'name','location' , 'company_id')
        ->get();

        return $branches;
    }
}
