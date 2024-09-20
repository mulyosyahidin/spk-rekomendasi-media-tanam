<?php

if (!function_exists('activeClass')) {
    /**
     * Menghasilkan kelas aktif untuk rute yang diberikan.
     *
     * Fungsi ini memeriksa apakah rute saat ini cocok dengan salah satu rute yang diberikan.
     * Jika cocok, fungsi akan mengembalikan kelas yang ditentukan (default 'active').
     * Juga dapat memeriksa query string dan mengembalikan kelas jika query cocok.
     *
     * @param array|string $routes Rute atau daftar rute yang akan diperiksa.
     * @param string $class Kelas yang akan dikembalikan jika rute cocok. Default 'active'.
     * @param array $queries Array dari pasangan kunci dan nilai untuk memeriksa query string.
     * @return string Kelas yang sesuai jika ada kecocokan, jika tidak, mengembalikan string kosong.
     */
    function activeClass(array|string $routes = [], string $class = 'active', array $queries = []): string
    {
        if (is_string($routes)) {
            $routes = [$routes];
        }

        foreach ($routes as $key => $value) {
            if (request()->routeIs($value)) {
                // If current route is equal to given route, return active class
                return $class;
            }
        }

        if (count($queries) > 0) {
            foreach ($queries as $key => $value) {
                if (request()->query($key) == $value) {
                    return $class;
                }
            }
        }

        return '';
    }
}

if (!function_exists('createAcronym')) {
    /**
     * Membuat akronim dari string yang diberikan.
     *
     * Fungsi ini mengambil string, memecahnya menjadi kata-kata,
     * dan menghasilkan akronim dengan mengambil huruf pertama dari setiap kata.
     *
     * @param string $string String input yang akan diubah menjadi akronim.
     * @param string $delimiter Delimiter yang akan digunakan antara huruf-huruf akronim. Default adalah string kosong.
     * @param int $max Batasi jumlah huruf akronim yang dihasilkan. Default -1 (tidak ada batasan).
     * @return string Akonim yang dihasilkan dari string input.
     */
    function createAcronym(string $string, string $delimiter = '', int $max = -1): string
    {
        if (empty($string)) {
            return '';
        }

        $acronym = '';
        $words = preg_split('/[^\p{L}]+/u', $string);

        foreach ($words as $word) {
            if (!empty($word)) {
                $first_letter = mb_substr($word, 0, 1);
                $acronym .= $first_letter . $delimiter;

                // Batasi jumlah huruf akronim jika $max lebih dari 0
                if ($max > 0 && strlen($acronym) >= $max) {
                    break;
                }
            }
        }

        // Menghapus delimiter terakhir jika ada
        return rtrim($acronym, $delimiter);
    }

}
