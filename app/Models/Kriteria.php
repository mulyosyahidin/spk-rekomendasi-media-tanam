<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'kriteria';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'bobot',
        'jenis',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function subKriteria(): HasMany
    {
        return $this->hasMany(Sub_kriteria::class, 'id_kriteria');
    }

    /**
     * @return HasMany
     */
    public function nilaiSubKriteria(): HasMany
    {
        return $this->hasMany(Nilai_sub_kriteria::class, 'id_kriteria');
    }
}
