<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Media_tanam;
use App\Models\Nilai_sub_kriteria;
use App\Models\Sistem_tanam;
use App\Services\PerhitunganService;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PerhitunganService $perhitunganService)
    {
        $alternatif = $perhitunganService->getAlternatif();

        return view('admin.alternatif.index', compact('alternatif'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PerhitunganService $perhitunganService, Media_tanam $media_tanam, Sistem_tanam $sistem_tanam)
    {
        $kode = $perhitunganService->getKode($media_tanam->id, $sistem_tanam->id);
        $kriteria = Kriteria::orderBy('nama')->get();

        return view('admin.alternatif.show', compact('media_tanam', 'sistem_tanam', 'kode', 'kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editNilaiSubKriteria(Media_tanam $media_tanam, Sistem_tanam $sistem_tanam, Kriteria $kriteria)
    {
        $data = Nilai_sub_kriteria::where('id_media_tanam', $media_tanam->id)
            ->where('id_sistem_tanam', $sistem_tanam->id)
            ->where('id_kriteria', $kriteria->id)
            ->get();

        $kriteria->load('subKriteria');

        return view('admin.alternatif.sub-kriteria.edit', compact('media_tanam', 'sistem_tanam', 'kriteria', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateNilaiSubKriteria(Request $request, Media_tanam $media_tanam, Sistem_tanam $sistem_tanam, Kriteria $kriteria)
    {
        $dataBobot = $request->bobot;

        foreach ($dataBobot as $idSubKriteria => $bobot) {
            Nilai_sub_kriteria::updateOrCreate(
                [
                    'id_sistem_tanam' => $sistem_tanam->id,
                    'id_media_tanam' => $media_tanam->id,
                    'id_kriteria' => $kriteria->id,
                    'id_sub_kriteria' => $idSubKriteria,
                ],
                [
                    'bobot' => $bobot,
                ]
            );
        }

        return redirect()->back()->with('success', 'Berhasil memperbarui data nilai sub kriteria alternatif');
    }
}
