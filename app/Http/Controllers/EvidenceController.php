<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Evidence;
use Illuminate\Http\Request;

class EvidenceController extends Controller
{
    public function create(Crime $crime)
    {
        return view('evidence.create', compact('crime'));
    }

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

        return redirect()->route('officer.crimes.show', $crime)->with('success', 'Evidence added successfully.');
    }

    public function edit(Evidence $evidence)
    {
        return view('evidence.edit', compact('evidence'));
    }

    public function update(Request $request, Evidence $evidence)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $evidence->update($request->all());

        return redirect()->route('officer.crimes.show', $evidence->crime)->with('success', 'Evidence updated successfully.');
    }

    public function destroy(Evidence $evidence)
    {
        $crime = $evidence->crime;
        $evidence->delete();

        return redirect()->route('officer.crimes.show', $crime)->with('success', 'Evidence deleted successfully.');
    }
}