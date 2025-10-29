<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crime;
use App\Models\Evidence;

class EvidenceController extends Controller
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
            'description' => 'required|string',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx',
        ]);

        $filePath = $request->file('file')->store('evidence', 'public');

        $crime->evidence()->create([
            'description' => $request->description,
            'file_path' => $filePath,
        ]);

        return redirect()->route('crimes.show', $crime->id)->with('success', 'Evidence added successfully.');
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
