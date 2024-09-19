<?php

namespace App\Services;

use App\Models\Media_tanam;
use App\Models\Sistem_tanam;

class PerhitunganService {
    public function getAlternatif()
    {
        $alternatif = [];

        $mediaTanam = Media_tanam::all();
        $sistemTanam = Sistem_tanam::all();

        foreach ($mediaTanam as $mediaIndex => $media) {
            foreach ($sistemTanam as $sistemIndex => $sistem) {
                $kode = chr(65 + $mediaIndex) . ($sistemIndex + 1);
                $alternatif[] = [
                    'kode' => $kode,
                    'media_tanam' => $media,
                    'sistem_tanam' => $sistem,
                ];
            }
        }

        return $alternatif;
    }

    public function getKode(int $idMediaTanam, int $idSistemTanam)
    {
        $alternatif = $this->getAlternatif();

        foreach ($alternatif as $alt) {
            if ($alt['media_tanam']->id == $idMediaTanam && $alt['sistem_tanam']->id == $idSistemTanam) {
                return $alt['kode'];
            }
        }

        return null;
    }

}
