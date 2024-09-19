<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Tanaman;
use App\Services\PerhitunganService;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $tanaman = Tanaman::orderBy('nama')->get();

        return view('admin.perhitungan.index', compact('tanaman'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PerhitunganService $perhitunganService, Tanaman $tanaman)
    {
        $alternatif = $perhitunganService->getAlternatif();
        $kriteria = Kriteria::orderBy('nama')->get();

        return view('admin.perhitungan.show', compact('tanaman', 'alternatif', 'kriteria'));
    }
}
