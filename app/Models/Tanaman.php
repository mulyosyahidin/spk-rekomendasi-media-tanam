<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * Get the characteristics (criteria) associated with the plant.
     *
     * This method defines a many-to-many relationship between the Tanaman model and the Kriteria model
     * via the `karakteristik_tanaman` pivot table. The pivot table also contains the 'nilai' (value) attribute.
     *
     * @return BelongsToMany The relationship instance.
     */
    public function karakteristik(): BelongsToMany
    {
        return $this->belongsToMany(Kriteria::class, 'karakteristik_tanaman', 'id_tanaman', 'id_kriteria')
            ->withPivot('nilai');
    }

    /**
     * Get the value of a specific characteristic for the plant.
     *
     * This method retrieves the 'nilai' (value) of a specific characteristic (criteria) based on the given criteria ID.
     * If the characteristic is not found, an empty string is returned.
     *
     * @param int $idKriteria The ID of the criteria for which the value is being retrieved.
     * @return string The value of the specified characteristic or an empty string if not found.
     */
    public function nilai(int $idKriteria): string
    {
        return $this->karakteristik->where('id', $idKriteria)->first()?->pivot->nilai ?? '';
    }
}
