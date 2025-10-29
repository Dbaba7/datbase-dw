<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Crime;
use App\Models\Officer;

class ChiefController extends Controller
{
    public function dashboard()
    {
        $crimesCount = Crime::count();
        $openCasesCount = Crime::where('status', 'open')->count();
        $officersCount = Officer::count();
        $recentCrimes = Crime::latest()->take(10)->get();

        return view('chief.dashboard', compact('crimesCount', 'openCasesCount', 'officersCount', 'recentCrimes'));
    }
}