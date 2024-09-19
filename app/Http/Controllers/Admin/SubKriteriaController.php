<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubKriteria\StoreRequest;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriterium)
    {
        return view('admin.sub-kriteria.show', compact('kriterium'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Kriteria $kriterium)
    {
        $kriterium->subKriteria()->create($request->validated());

        return redirect()->back()->with('success', 'Berhasil menambah data sub kriteria');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Kriteria $kriterium)
    {
        $idSubKriteria = $request->id_sub_kriteria;

        $kriterium->subKriteria()->where('id', $idSubKriteria)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data sub kriteria');
    }
}
