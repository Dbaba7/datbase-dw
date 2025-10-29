<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Officer;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Not typically used in this context
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Handled via the crime show page
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Crime $crime)
    {
        $request->validate([
            'officer_id' => 'required|exists:officers,id',
        ]);

        if ($crime->officers->contains($request->officer_id)) {
            return redirect()->route('crimes.show', $crime->id)->with('error', 'Officer already assigned to this case.');
        }

        $crime->officers()->attach($request->officer_id);

        return redirect()->route('crimes.show', $crime->id)->with('success', 'Officer assigned successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not typically used in this context
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Not typically used in this context
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Not typically used in this context
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crime $crime, Officer $officer)
    {
        $crime->officers()->detach($officer->id);

        return redirect()->route('crimes.show', $crime->id)->with('success', 'Officer unassigned successfully.');
    }
}
