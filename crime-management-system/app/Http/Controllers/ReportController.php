<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generate(Request $request)
    {
        $crimes = Crime::query()
            ->when($request->search, function ($query, $search) {
                return $query->where('crime_type', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->get();

        $pdf = Pdf::loadView('reports.crimes', compact('crimes'));
        return $pdf->download('crime_report.pdf');
    }
}
