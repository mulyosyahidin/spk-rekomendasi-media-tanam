<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubKriteria\StoreRequest;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Display the sub-criteria associated with the given criteria.
     *
     * This method retrieves the specified "Kriteria" (Criteria) model and
     * passes it to the 'admin.sub-kriteria.show' view.
     *
     * @param Kriteria $kriterium The criteria whose sub-criteria are to be displayed.
     * @return \Illuminate\View\View The view displaying the sub-criteria.
     */
    public function show(Kriteria $kriterium)
    {
        return view('admin.sub-kriteria.show', compact('kriterium'));
    }

    /**
     * Store new sub-criteria for the given criteria.
     *
     * This method validates the incoming request and then stores the new sub-criteria based on the type of input.
     * If the criteria's input type is "NILAI", it creates a single sub-criteria with the provided values.
     * If the input type is different, it loops through an array of options and creates multiple sub-criteria.
     *
     * @param StoreRequest $request The validated request containing sub-criteria data.
     * @param Kriteria $kriterium The criteria to which the sub-criteria will be added.
     * @return \Illuminate\Http\RedirectResponse A redirect back to the previous page with a success message.
     */
    public function store(StoreRequest $request, Kriteria $kriterium)
    {
        if ($kriterium->tipe_input == \App\Enums\TipeInputKriteria::NILAI->value) {
            $kriterium->subKriteria()->create([
                'nilai_a' => $request->nilai_a,
                'nilai_b' => $request->nilai_b,
                'bobot' => $request->bobot,
                'operator' => $request->operator,
            ]);
        } else {
            foreach ($request->nilai ?? [] as $nilai) {
                $pilihan = $nilai['pilihan'];
                $bobot = $nilai['bobot'];

                // check if the sub-criteria with the same weight exists
                if (!$kriterium->subKriteria()->where('bobot', $bobot)->exists()) {
                    if (!empty($bobot) && !empty($pilihan)) {
                        $kriterium->subKriteria()->create([
                            'nilai_a' => $pilihan,
                            'bobot' => $bobot,
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'Berhasil menambah data sub kriteria');
    }

    /**
     * Delete a specific sub-criteria from the given criteria.
     *
     * This method deletes the sub-criteria with the provided ID from the given "Kriteria" (Criteria) model.
     *
     * @param Request $request The request containing the ID of the sub-criteria to be deleted.
     * @param Kriteria $kriterium The criteria from which the sub-criteria will be deleted.
     * @return \Illuminate\Http\RedirectResponse A redirect back to the previous page with a success message.
     */
    public function destroy(Request $request, Kriteria $kriterium)
    {
        $idSubKriteria = $request->id_sub_kriteria;

        $kriterium->subKriteria()->where('id', $idSubKriteria)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data sub kriteria');
    }
}
