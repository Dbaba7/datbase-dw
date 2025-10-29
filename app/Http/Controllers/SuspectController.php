<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Suspect;
use Illuminate\Http\Request;

class SuspectController extends Controller
{
    public function create(Crime $crime)
    {
        return view('suspects.create', compact('crime'));
    }

    public function store(Request $request, Crime $crime)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'statement' => 'required|string',
        ]);

        $crime->suspects()->create($request->all());

        return redirect()->route('officer.crimes.show', $crime)->with('success', 'Suspect added successfully.');
    }

    public function edit(Suspect $suspect)
    {
        return view('suspects.edit', compact('suspect'));
    }

    public function update(Request $request, Suspect $suspect)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'statement' => 'required|string',
        ]);

        $suspect->update($request->all());

        return redirect()->route('officer.crimes.show', $suspect->crime)->with('success', 'Suspect updated successfully.');
    }

    public function destroy(Suspect $suspect)
    {
        $crime = $suspect->crime;
        $suspect->delete();

        return redirect()->route('officer.crimes.show', $crime)->with('success', 'Suspect deleted successfully.');
    }
}