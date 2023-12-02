<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReservationExport;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::orderBy('id', 'DESC')->get();
        return view('backend.admin.reservations.index' , compact('reservations'));
    }

    public function export()
    {
        return Excel::download(new ReservationExport, 'Reservation.xlsx');
    }


}
