<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tanaman extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'tanaman';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return BelongsToMany The relationship instance.
     */
    public function karakteristik(): BelongsToMany
    {
        return $this->belongsToMany(Kriteria::class, 'karakteristik_tanaman', 'id_tanaman', 'id_kriteria')
            ->withPivot('id_sub_kriteria');
    }

    /**
     * @return string The nilai of the tanaman.
     */
    public function nilai(int $idKriteria): string
    {
        $idSubKriteria = $this->karakteristik->where('id', $idKriteria)->first()?->pivot->id_sub_kriteria;

        return $idSubKriteria ? Sub_kriteria::find($idSubKriteria)->sub_kriteria : '';
    }

    /**
     * @return HasMany
     */
    public function hasilPerhitungan(): HasMany
    {
        return $this->hasMany(Hasil_perhitungan::class, 'id_tanaman');
    }

    /**
     * @return Attribute
     */
    public function statusPerhitungan(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->hasilPerhitungan->count() > 0;
            }
        );
    }
}
