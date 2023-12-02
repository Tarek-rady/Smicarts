<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CommunicationExport;
use App\Http\Controllers\Controller;
use App\Models\Communication;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Communication::orderBy('id', 'DESC')->get();
        return view('backend.admin.contact-us.index' , compact('contacts'));
    }

    public function export()
    {
        return Excel::download(new CommunicationExport, 'Communication.xlsx');
    }



}
