<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Perhitungan_user extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_tanaman',
    ];

    /**
     * Get the karakteristik for the perhitungan user.
     */
    public function karakteristik(): HasMany
    {
        return $this->hasMany(Perhitungan_user_karakteristik::class, 'id_perhitungan_user');
    }

    /**
     * Get the hasil for the perhitungan user.
     */
    public function hasil(): HasMany
    {
        return $this->hasMany(Perhitungan_user_hasil::class, 'id_perhitungan_user');
    }

    /**
     * @return string The nilai of the tanaman.
     */
    public function nilai(int $idKriteria): string
    {
        $idSubKriteria = $this->karakteristik->where('id', $idKriteria)->first()?->id_sub_kriteria;

        return $idSubKriteria ? Sub_kriteria::find($idSubKriteria)->sub_kriteria : '';
    }
}
