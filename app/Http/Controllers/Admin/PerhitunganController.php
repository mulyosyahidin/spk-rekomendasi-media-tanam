<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hasil_perhitungan;
use App\Models\Kriteria;
use App\Models\Tanaman;
use App\Services\PerhitunganService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::denies('akses-perhitungan', $tanaman)) {
            return redirect()->route('admin.perhitungan.hasil', $tanaman);
        }

        $kriteria = Kriteria::orderBy('nama')->get();
        $alternatif = $perhitunganService->getAlternatif();

        return view('admin.perhitungan.show', compact('tanaman', 'alternatif', 'kriteria'));
    }

    /**
     * Menampilkan matrix keputusan.
     */
    public function matrixKeputusan(PerhitunganService $perhitunganService, Tanaman $tanaman)
    {
        if (Gate::denies('data-karakteristik-terisi', $tanaman)) {
            return redirect()->route('admin.karakteristik-tanaman.edit', $tanaman);
        }

        $alternatif = $perhitunganService->getAlternatif();
        $data = $perhitunganService->matrixKeputusan($tanaman);
        $kriteria = Kriteria::orderBy('nama')->get();

        return view('admin.perhitungan.matrix-keputusan', compact('tanaman', 'alternatif', 'data', 'kriteria'));
    }

    /**
     * Menampilkan matrix normalisasi.
     */
    public function matrixNormalisasi(PerhitunganService $perhitunganService, Tanaman $tanaman)
    {
        if (Gate::denies('data-karakteristik-terisi', $tanaman)) {
            return redirect()->route('admin.karakteristik-tanaman.edit', $tanaman);
        }

        $alternatif = $perhitunganService->getAlternatif();
        $data = $perhitunganService->matrixNormalisasi($tanaman);
        $kriteria = Kriteria::orderBy('nama')->get();

        return view('admin.perhitungan.matrix-normalisasi', compact('tanaman', 'alternatif', 'data', 'kriteria'));
    }

    /**
     * Menampilkan matrix optimalisasi.
     */
    public function matrixOptimalisasi(PerhitunganService $perhitunganService, Tanaman $tanaman)
    {
        if (Gate::denies('data-karakteristik-terisi', $tanaman)) {
            return redirect()->route('admin.karakteristik-tanaman.edit', $tanaman);
        }

        $alternatif = $perhitunganService->getAlternatif();
        $data = $perhitunganService->matrixOptimalisasi($tanaman);
        $kriteria = Kriteria::orderBy('nama')->get();

        return view('admin.perhitungan.matrix-optimalisasi', compact('tanaman', 'alternatif', 'data', 'kriteria'));
    }

    /**
     * Menampilkan pemeringkatan.
     */
    public function pemeringkatan(PerhitunganService $perhitunganService, Tanaman $tanaman)
    {
        if (Gate::denies('data-karakteristik-terisi', $tanaman)) {
            return redirect()->route('admin.karakteristik-tanaman.edit', $tanaman);
        }

        $alternatif = $perhitunganService->getAlternatif();
        $data = $perhitunganService->pemeringkatan($tanaman);

        return view('admin.perhitungan.pemeringkatan', compact('tanaman', 'alternatif', 'data'));
    }

    /**
     * Simpan hasil perhitungan.
     */
    public function simpan(PerhitunganService $perhitunganService, Tanaman $tanaman)
    {
        if (Gate::denies('data-karakteristik-terisi', $tanaman)) {
            return redirect()->route('admin.karakteristik-tanaman.edit', $tanaman);
        }

        if (Gate::denies('akses-perhitungan', $tanaman)) {
            return redirect()->route('admin.perhitungan.hasil', $tanaman);
        }

        $hasilAkhir = $perhitunganService->hasilAkhir($tanaman);

        foreach ($hasilAkhir as $item) {
            $tanaman->hasilPerhitungan()->create([
                'id_sistem_tanam' => $item['sistem_tanam']->id,
                'id_media_tanam' => $item['media_tanam']->id,
                'kode_alternatif' => $item['kode'],
                'nilai' => $item['nilai'],
                'peringkat' => $item['peringkat'],
            ]);
        }

        return redirect()->route('admin.perhitungan.hasil', $tanaman)->with('success', 'Berhasil menyimpan hasil perhitungan');
    }

    /**
     * Menampilkan hasil perhitungan.
     */
    public function hasil(PerhitunganService $perhitunganService, Tanaman $tanaman)
    {
        if (Gate::denies('data-karakteristik-terisi', $tanaman)) {
            return redirect()->route('admin.karakteristik-tanaman.edit', $tanaman);
        }

        $tanaman->load('hasilPerhitungan');

        if ($tanaman->hasilPerhitungan->count() == 0) {
            return redirect()->route('admin.perhitungan.show', $tanaman);
        }

        return view('admin.perhitungan.hasil', compact('tanaman'));
    }

    public function reset(Tanaman $tanaman)
    {
        $tanaman->hasilPerhitungan()->delete();

        return redirect()
            ->back()
            ->with('success', 'Berhasil mereset hasil perhitungan');
    }

    public function resetAll()
    {
        Hasil_perhitungan::truncate();

        return redirect()
            ->back()
            ->with('success', 'Berhasil mereset semua hasil perhitungan');
    }

}
