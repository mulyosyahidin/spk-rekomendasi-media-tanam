<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tanaman\StoreRequest;
use App\Http\Requests\Admin\Tanaman\UpdateRequest;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tanaman::all();

        return view('admin.tanaman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tanaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Tanaman::create($request->validated());

        return redirect()->route('admin.tanaman.index')->with('success', 'Berhasil menambah data tanaman');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanaman $tanaman)
    {
        return view('admin.tanaman.show', compact('tanaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanaman $tanaman)
    {
        return view('admin.tanaman.edit', compact('tanaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Tanaman $tanaman)
    {
        $tanaman->update($request->validated());

        return redirect()->route('admin.tanaman.index')->with('success', 'Berhasil memperbarui data tanaman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanaman $tanaman)
    {
        $tanaman->delete();

        return redirect()->route('admin.tanaman.index')->with('success', 'Berhasil menghapus data tanaman');
    }
}
