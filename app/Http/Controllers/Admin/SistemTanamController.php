<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SistemTanam\StoreRequest;
use App\Http\Requests\Admin\SistemTanam\UpdateRequest;
use App\Models\Sistem_tanam;
use Illuminate\Http\Request;

class SistemTanamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sistem_tanam::orderBy('nama')->get();

        return view('admin.sistem-tanam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sistem-tanam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Sistem_tanam::create($request->validated());

        return redirect()->route('admin.sistem-tanam.index')->with('success', 'Berhasil menambah data sistem tanam');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sistem_tanam $sistem_tanam)
    {
        return view('admin.sistem-tanam.edit', compact('sistem_tanam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Sistem_tanam $sistem_tanam)
    {
        $sistem_tanam->update($request->validated());

        return redirect()->route('admin.sistem-tanam.index')->with('success', 'Berhasil memperbarui data sistem tanam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sistem_tanam $sistem_tanam)
    {
        $sistem_tanam->delete();

        return redirect()->route('admin.sistem-tanam.index')->with('success', 'Berhasil menghapus data sistem tanam');
    }
}
