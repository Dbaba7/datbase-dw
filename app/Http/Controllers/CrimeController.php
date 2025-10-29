<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Officer;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $crimes = Crime::query()
            ->when($request->search, function ($query, $search) {
                return $query->where('crime_type', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->get();

        return view('crimes.index', compact('crimes'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        return view('crimes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'crime_type' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
        ]);

        Crime::create($request->all());

        return redirect()->route('crimes.index')->with('success', 'Crime reported successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Crime $crime)
    {
        $officers = Officer::all();
        return view('crimes.show', compact('crime', 'officers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crime $crime)
    {
        $request->validate([
            'status' => 'required|in:reported,under_investigation,resolved,closed',
        ]);

        $crime->update($request->all());

        return redirect()->route('crimes.show', $crime->id)->with('success', 'Case status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
