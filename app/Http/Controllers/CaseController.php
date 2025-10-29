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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Crime $crime)
    {
        $request->validate([
            'officer_id' => 'required|exists:officers,id',
        ]);

        $crime->officers()->attach($request->officer_id);

        return redirect()->route('crimes.show', $crime->id)->with('success', 'Officer assigned successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
