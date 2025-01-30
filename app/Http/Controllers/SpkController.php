<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Perhitungan_user;
use App\Services\PerhitunganUserService;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    public function index()
    {
        $dataKriteria = Kriteria::orderBy('nama')->get();

        return view('public.spk.index', compact('dataKriteria'));
    }

    public function store(Request $request, PerhitunganUserService $perhitunganUserService)
    {
        $request->validate([
           'nama' => 'required',
           'nilai' => 'required|array',
        ]);

        $perhitunganUser = Perhitungan_user::create([
            'nama_tanaman' => $request->nama,
        ]);

        foreach ($request->nilai as $idKriteria => $idSubKriteria) {
            $perhitunganUser->karakteristik()->create([
                'id_kriteria' => $idKriteria,
                'id_sub_kriteria' => $idSubKriteria,
            ]);
        }

        $hasilPerhitungan = $perhitunganUserService->hasilAkhir($perhitunganUser);

        foreach ($hasilPerhitungan as $hasil) {
            $perhitunganUser->hasil()->create([
                'id_media_tanam' => $hasil['media_tanam']['id'],
                'id_sistem_tanam' => $hasil['sistem_tanam']['id'],
                'kode' => $hasil['kode'],
                'nilai' => $hasil['nilai'],
                'peringkat' => $hasil['peringkat'],
            ]);
        }

        return redirect()->route('spk.hasil', $perhitunganUser);
    }

    public function hasil(Perhitungan_user $perhitungan_user)
    {
        $kriteria = Kriteria::orderBy('nama')->get();
        $perhitungan_user->load('hasil.sistemTanam', 'hasil.mediaTanam', 'karakteristik.kriteria', 'karakteristik.subKriteria');

        return view('public.spk.hasil', compact('perhitungan_user', 'kriteria'));
    }
}
