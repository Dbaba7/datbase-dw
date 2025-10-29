<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Officer;
use Illuminate\Http\Request;

class DispatcherController extends Controller
{
    public function create()
    {
        $officers = Officer::all();
        return view('dispatcher.create', compact('officers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'crime_type' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'officer_id' => 'required|exists:officers,id',
        ]);

        $crime = Crime::create($request->only('crime_type', 'description', 'location'));
        $crime->officers()->attach($request->officer_id);

        return redirect()->route('dispatcher.dashboard')->with('success', 'Crime reported and officer assigned.');
    }
}