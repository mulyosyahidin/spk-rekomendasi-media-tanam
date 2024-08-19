<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TipeInputKriteria;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Kriteria\StoreRequest;
use App\Http\Requests\Admin\Kriteria\UpdateRequest;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kriteria::orderBy('nama')->get();

        return view('admin.kriteria.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipeInput = TipeInputKriteria::array();

        return view('admin.kriteria.create', compact('tipeInput'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $kriterium = Kriteria::create($request->validated());

        return redirect()->route('admin.kriteria.show', $kriterium)->with('success', 'Berhasil menambah data kriteria');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriterium)
    {
        return view('admin.kriteria.show', compact('kriterium'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriterium)
    {
        $tipeInput = TipeInputKriteria::array();

        return view('admin.kriteria.edit', compact('kriterium', 'tipeInput'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Kriteria $kriterium)
    {
        $kriterium->update($request->validated());

        return redirect()->route('admin.kriteria.show', $kriterium)->with('success', 'Berhasil memperbarui data kriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriterium)
    {
        $kriterium->delete();

        return redirect()->route('admin.kriteria.index')->with('success', 'Berhasil menghapus data kriteria');
    }
}
