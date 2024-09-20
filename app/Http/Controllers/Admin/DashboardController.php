<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = [
            'kriteria' => \App\Models\Kriteria::count(),
            'alternatif' => \App\Models\Media_tanam::count() * \App\Models\Sistem_tanam::count(),
            'tanaman' => \App\Models\Tanaman::count(),
        ];

        return view('admin.dashboard', compact('count'));
    }
}
