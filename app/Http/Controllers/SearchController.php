<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        $crimes = Crime::query()
            ->when($request->crime_type, function ($query, $crime_type) {
                return $query->where('crime_type', 'like', "%{$crime_type}%");
            })
            ->when($request->location, function ($query, $location) {
                return $query->where('location', 'like', "%{$location}%");
            })
            ->when($request->status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($request->start_date, function ($query, $start_date) {
                return $query->whereDate('created_at', '>=\', $start_date);
            })
            ->when($request->end_date, function ($query, $end_date) {
                return $query->whereDate('created_at', '<=\', $end_date);
            })
            ->get();

        return view('search.results', compact('crimes'));
    }
}
