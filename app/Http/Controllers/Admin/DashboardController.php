<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crime;
use App\Models\Evidence;
use App\Models\Officer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Count statistics
        $crimesCount = Crime::count();
        $officersCount = Officer::count();
        $openCasesCount = Crime::where('status', 'open')->count();
        $evidenceCount = Evidence::count();

        // Get recent crimes with their relationships
        $recentCrimes = Crime::with(['officers'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'crimesCount',
            'officersCount',
            'openCasesCount',
            'evidenceCount',
            'recentCrimes'
        ));
    }
}
