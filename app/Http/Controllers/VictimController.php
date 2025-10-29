<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Victim;
use Illuminate\Http\Request;

class VictimController extends Controller
{
    public function create(Crime $crime)
    {
        return view('victims.create', compact('crime'));
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

        $crime->victims()->create($request->all());

        return redirect()->route('officer.crimes.show', $crime)->with('success', 'Victim added successfully.');
    }

    public function edit(Victim $victim)
    {
        return view('victims.edit', compact('victim'));
    }

    public function update(Request $request, Victim $victim)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'statement' => 'required|string',
        ]);

        $victim->update($request->all());

        return redirect()->route('officer.crimes.show', $victim->crime)->with('success', 'Victim updated successfully.');
    }

    public function destroy(Victim $victim)
    {
        $crime = $victim->crime;
        $victim->delete();

        return redirect()->route('officer.crimes.show', $crime)->with('success', 'Victim deleted successfully.');
    }
}