<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $totalCalculations = $user->perhitungans()->count();
        $recentCalculations = $user->perhitungans()
            ->with('tanaman')
            ->latest()
            ->limit(5)
            ->get();

        return view('user.dashboard', compact('user', 'totalCalculations', 'recentCalculations'));
    }
}
