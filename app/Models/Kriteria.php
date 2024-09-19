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
     * Get the sub-criteria associated with the criteria.
     *
     * This method defines a one-to-many relationship between the Kriteria model and the SubKriteria model.
     *
     * @return HasMany The relationship instance.
     */
    public function subKriteria(): HasMany
    {
        return $this->hasMany(Sub_kriteria::class, 'id_kriteria');
    }

    public function nilaiSubKriteria()
    {
        return $this->hasMany(Nilai_sub_kriteria::class, 'id_kriteria');
    }
}
