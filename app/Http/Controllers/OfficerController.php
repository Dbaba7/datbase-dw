<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficerController extends Controller
{
    public function dashboard()
    {
        $officer = Officer::where('user_id', Auth::id())->first();
        $crimes = $officer ? $officer->crimes : collect();

        return view('officer.dashboard', compact('crimes'));
    }

    public function show(Crime $crime)
    {
        return view('officer.show', compact('crime'));
    }
}