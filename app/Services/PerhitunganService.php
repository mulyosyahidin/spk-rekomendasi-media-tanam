<?php

namespace App\Services;

use App\Models\Kriteria;
use App\Models\Media_tanam;
use App\Models\Sistem_tanam;
use App\Models\Tanaman;

class PerhitunganService
{
    /**
     * Mendapatkan data alternatif
     *
     * Alternatif yaitu kombinasi dari media tanam dan sistem tanam
     * dengan memberikan kode unik.
     *
     * @return array
     */
    public function getAlternatif(): array
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

    /**
     * Membuat matrix keputusan
     *
     * Matrix keputusan adalah matrix yang mengubah nilai karakteristik tanaman
     * menjadi bobot yang sesuai dengan nilai kriteria alternatif.
     *
     * @param Tanaman $tanaman
     * @return array
     */
    public function matrixKeputusan(Tanaman $tanaman): array
    {
        $data = [];

        $alternatif = $this->getAlternatif();
        $kriteria = Kriteria::orderBy('nama')->get();

        $i = 0;
        foreach ($alternatif as $item) {
            $data[$i] = [
                'media_tanam' => $item['media_tanam'],
                'sistem_tanam' => $item['sistem_tanam'],
                'kode' => $item['kode'],
            ];

            foreach ($kriteria as $item2) {
                $nilai = $item2->nilaiSubKriteria()
                    ->where('id_sistem_tanam', $item['sistem_tanam']['id'])
                    ->where('id_media_tanam', $item['media_tanam']['id'])
                    ->where('id_sub_kriteria', $tanaman->karakteristik()->where('id_kriteria', $item2->id)->first()?->pivot->id_sub_kriteria)
                    ->first()?->bobot;

                if (!is_null($nilai)) {
                    $data[$i]['nilai'][$item2->id] = $nilai;
                } else {
                    $data[$i]['nilai'][$item2->id] = null;
                }
            }

            $i++;
        }

        // jika tanaman sudah dihitung, hapus data yang memiliki nilai null
        if ($tanaman->status_perhitungan) {
            foreach ($data as $key => $value) {
                $jumlahNilai = count($value['nilai']);
                $jumlahNilaiTidakNull = count(array_filter($value['nilai'], function ($nilai) {
                    return !is_null($nilai);
                }));

                if ($jumlahNilai != $jumlahNilaiTidakNull) {
                    unset($data[$key]);
                }
            }

            $data = array_values($data);
        }

        return $data;
    }

    /**
     * Membuat matrix normalisasi
     *
     * Matrix normalisasi adalah matrix yang mengubah nilai matrix keputusan
     * menjadi nilai yang sudah dinormalisasi.
     *
     * Normalisasi dalam metode ini dilakukan dengan cara membagi nilai setiap
     * kriteria dengan jumlah nilai kuadrat setiap kriteria.
     *
     * @param Tanaman $tanaman
     * @return array
     */
    public function matrixNormalisasi(Tanaman $tanaman): array
    {
        $data = [];

        $matrixKeputusan = $this->matrixKeputusan($tanaman);
        $kriteria = Kriteria::orderBy('nama')->get();

        $sumPowValues = [];

        foreach ($kriteria as $item2) {
            $sumPowValues[$item2->id] = 0;

            foreach ($matrixKeputusan as $item) {
                $nilai = $item['nilai'][$item2->id] ?? 0;

                // penjumlahan nilai kuadrat
                $sumPowValues[$item2->id] += pow($nilai, 2);
            }
        }

        $i = 0;
        foreach ($matrixKeputusan as $item) {
            $data[$i] = [
                'media_tanam' => $item['media_tanam'],
                'sistem_tanam' => $item['sistem_tanam'],
                'kode' => $item['kode'],
            ];

            foreach ($kriteria as $item2) {
                $nilai = $item['nilai'][$item2->id] ?? 0;

                // rumus normalisasi: nilai / akar kuadrat dari jumlah nilai kuadrat
                $data[$i]['nilai'][$item2->id] = ($sumPowValues[$item2->id] > 0) ? $nilai / $sumPowValues[$item2->id] : 0;
            }

            $i++;
        }

        return $data;
    }

    /**
     * Membuat matrix optimalisasi
     *
     * Matrix optimalisasi adalah matrix yang mengubah nilai matrix normalisasi
     * dengan mempertimbangkan bobot kriteria dan jenis kriteria (cost atau benefit).
     *
     * Proses optimalisasi dilakukan sebagai berikut:
     * - Untuk kriteria bertipe 'benefit', nilai normalisasi dikalikan dengan bobot kriteria.
     * - Untuk kriteria bertipe 'cost', nilai optimalisasi dihitung dengan membagi 1 dengan
     *   nilai normalisasi, kemudian dikalikan dengan nilai maksimum dari kriteria tersebut,
     *   dan dikalikan dengan bobot kriteria.
     *
     * @param Tanaman $tanaman
     * @return array
     */
    public function matrixOptimalisasi(Tanaman $tanaman): array
    {
        $data = [];

        $matrixNormalisasi = $this->matrixNormalisasi($tanaman);
        $kriteria = Kriteria::orderBy('nama')->get();

        $i = 0;
        foreach ($matrixNormalisasi as $item) {
            $data[$i] = [
                'media_tanam' => $item['media_tanam'],
                'sistem_tanam' => $item['sistem_tanam'],
                'kode' => $item['kode'],
            ];

            $maxValuesEachKriteria = [];

            foreach ($kriteria as $item2) {
                $maxValuesEachKriteria[$item2->id] = 0;

                foreach ($matrixNormalisasi as $item3) {
                    $nilai = $item3['nilai'][$item2->id] ?? 0;

                    // nilai maksimal dari setiap kriteria
                    $maxValuesEachKriteria[$item2->id] = max($maxValuesEachKriteria[$item2->id], $nilai);
                }
            }

            $nilaiOptimalisasi = [];

            foreach ($kriteria as $item2) {
                $jenis = $item2->jenis;
                $nilaiNormalisasi = $item['nilai'][$item2->id] ?? 0;
                $bobot = $item2->bobot;

                if ($jenis == 'cost') {
                    if ($nilaiNormalisasi == 0) {
                        $nilaiOptimalisasi[$item2->id] = 0;
                    } else {
                        // rumus optimalisasi untuk kriteria bertipe 'cost'
                        // rumus: (1 / nilai normalisasi) * nilai maksimal * bobot
                        $nilaiOptimalisasi[$item2->id] = (1 / $nilaiNormalisasi) * $maxValuesEachKriteria[$item2->id] * ($bobot / 100);
                    }
                } else {
                    // rumus optimalisasi untuk kriteria bertipe 'benefit'
                    // rumus: nilai normalisasi * bobot
                    $nilaiOptimalisasi[$item2->id] = $nilaiNormalisasi * ($bobot / 100);
                }
            }

            $data[$i]['nilai'] = $nilaiOptimalisasi;

            $i++;
        }

        return $data;
    }

    /**
     * Melakukan pemeringkatan berdasarkan nilai optimalisasi
     *
     * Metode ini mengambil matrix optimalisasi yang telah dihitung sebelumnya,
     * kemudian menjumlahkan nilai dari setiap kriteria untuk menentukan nilai total
     * dari setiap alternatif (media_tanam). Alternatif kemudian diurutkan berdasarkan
     * nilai total dalam urutan menurun, dan diberikan peringkat.
     *
     * Proses pemeringkatan dilakukan sebagai berikut:
     * - Nilai optimalisasi dijumlahkan untuk setiap alternatif.
     * - Data diurutkan berdasarkan nilai total (nilai tertinggi memiliki peringkat pertama).
     * - Peringkat dihitung menggunakan metode dense ranking, dimana alternatif dengan nilai yang
     *   sama akan mendapatkan peringkat yang sama.
     * - Jika nilai total 0, peringkat diberikan 0.
     *
     * @param Tanaman $tanaman
     * @return array
     */
    public function pemeringkatan(Tanaman $tanaman): array
    {
        $data = [];

        $matrixOptimalisasi = $this->matrixOptimalisasi($tanaman);

        $i = 0;
        foreach ($matrixOptimalisasi as $item) {
            $data[$i] = [
                'media_tanam' => $item['media_tanam'],
                'sistem_tanam' => $item['sistem_tanam'],
                'kode' => $item['kode'],
                'nilai' => array_sum($item['nilai']),
            ];

            $i++;
        }

        // Urutkan data berdasarkan nilai dalam urutan menurun
        usort($data, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        $rank = 1;
        for ($i = 0; $i < count($data); $i++) {
            if ($i > 0 && $data[$i]['nilai'] == $data[$i - 1]['nilai']) {
                $data[$i]['peringkat'] = $data[$i - 1]['peringkat'];
            } else {
                $data[$i]['peringkat'] = $rank;

                $rank++;
            }
        }

        return $data;
    }

    /**
     * Mengambil hasil akhir dari pemeringkatan
     *
     * Metode ini menghasilkan daftar alternatif yang telah diurutkan berdasarkan
     * nilai optimalisasi dan peringkat. Hanya alternatif dengan nilai yang tidak
     * sama dengan 0 yang akan dimasukkan dalam hasil akhir.
     *
     * Proses yang dilakukan:
     * - Memanggil metode pemeringkatan untuk mendapatkan alternatif beserta nilai dan peringkatnya.
     * - Memfilter alternatif yang memiliki nilai lebih dari 0.
     * - Mengembalikan hasil berupa daftar alternatif yang mencakup media_tanam, sistem_tanam, kode,
     *   nilai optimalisasi, dan peringkat.
     *
     * @param Tanaman $tanaman
     * @return array
     */
    public function hasilAkhir(Tanaman $tanaman): array
    {
        $alternatif = $this->pemeringkatan($tanaman);

        $hasil = [];
        foreach ($alternatif as $alt) {
            if ($alt['nilai'] != 0) {
                $hasil[] = [
                    'media_tanam' => $alt['media_tanam'],
                    'sistem_tanam' => $alt['sistem_tanam'],
                    'kode' => $alt['kode'],
                    'nilai' => $alt['nilai'],
                    'peringkat' => $alt['peringkat'],
                ];
            }
        }

        return $hasil;
    }

    /**
     * Mendapatkan kode alternatif berdasarkan id media tanam dan id sistem tanam
     *
     * @param int $idMediaTanam
     * @param int $idSistemTanam
     * @return string|null
     */
    public function getKode(int $idMediaTanam, int $idSistemTanam): ?string
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
