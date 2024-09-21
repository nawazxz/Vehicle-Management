<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Checkout;
use App\Models\Expense;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use PDF; 

class ReportController extends Controller
{
    public function downloadReport()
    {
        $checkins = Checkin::latest()->get();
        $checkouts = Checkout::latest()->get();
        $expenses = Expense::latest()->get();


        $pdf = Pdf::loadView('reports', compact('checkins', 'checkouts', 'expenses'));

        return $pdf->download('report.pdf');
    }
}
