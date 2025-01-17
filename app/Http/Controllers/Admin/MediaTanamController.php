<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MediaTanam\StoreRequest;
use App\Http\Requests\Admin\MediaTanam\UpdateRequest;
use App\Models\Media_tanam;
use App\Services\FileService;
use Illuminate\Http\Request;

class MediaTanamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Media_tanam::orderBy('nama')->get();

        return view('admin.media-tanam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media-tanam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, FileService $fileService)
    {
        $mediaTanam = Media_tanam::create($request->validated());

        $foto = $fileService->upload('foto');
        if ($foto) {
            $mediaTanam->update([
                'foto' => $foto['file_path'],
            ]);
        }

        return redirect()->route('admin.media-tanam.index')->with('success', 'Berhasil menambah data media tanam');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media_tanam $media_tanam)
    {
        return view('admin.media-tanam.edit', compact('media_tanam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Media_tanam $media_tanam, FileService $fileService)
    {
        $media_tanam->update($request->validated());

        $foto = $fileService->upload('foto');
        if ($foto) {
            if ($media_tanam->foto) {
                $fileService->delete($media_tanam->foto);
            }

            $media_tanam->update([
                'foto' => $foto['file_path'],
            ]);
        }

        return redirect()->route('admin.media-tanam.index')->with('success', 'Berhasil memperbarui data media tanam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media_tanam $media_tanam)
    {
        $media_tanam->delete();

        return redirect()->route('admin.media-tanam.index')->with('success', 'Berhasil menghapus data media tanam');
    }
}
