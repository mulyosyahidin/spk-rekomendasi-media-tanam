<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class RekomendasiMediaTanamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tanaman::whereHas('hasilPerhitungan')->get();

        return view('rekomendasi-media-tanam.index', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanaman $tanaman)
    {
        $tanaman->load('hasilPerhitungan', 'hasilPerhitungan.sistemTanam', 'hasilPerhitungan.mediaTanam');
        $kriteria = Kriteria::all();

        return view('rekomendasi-media-tanam.show', compact('tanaman', 'kriteria'));
    }
}
