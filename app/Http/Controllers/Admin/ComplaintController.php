<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ComplaintExport;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ComplaintController extends Controller
{

    public function index()
    {
        $complaints = Complaint::orderBy('id', 'DESC')->get();
        return view('backend.admin.complaints.index' , compact('complaints'));
    }

    public function export()
    {
        return Excel::download(new ComplaintExport, 'Copmlaint.xlsx');
    }


}
