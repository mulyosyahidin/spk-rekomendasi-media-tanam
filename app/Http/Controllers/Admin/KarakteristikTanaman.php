<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class KarakteristikTanaman extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataTanaman = Tanaman::with('karakteristik')->orderBy('nama')->get();
        $dataKriteria = Kriteria::orderBy('nama')->get();

        return view('admin.karakteristik-tanaman.index', compact('dataTanaman', 'dataKriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanaman $tanaman)
    {
        $dataKriteria = Kriteria::orderBy('nama')->get();

        return view('admin.karakteristik-tanaman.edit', compact('tanaman', 'dataKriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanaman $tanaman)
    {
        foreach ($request->nilai ?? [] as $idKriteria => $idSubKriteria) {
            $tanaman->karakteristik()->syncWithoutDetaching([
                $idKriteria => ['id_sub_kriteria' => $idSubKriteria]
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil memperbarui data');
    }
}
