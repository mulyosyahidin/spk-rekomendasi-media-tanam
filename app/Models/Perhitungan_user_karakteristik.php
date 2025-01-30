<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perhitungan_user_karakteristik extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'perhitungan_user_karakteristik';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_perhitungan_user',
        'id_kriteria',
        'id_sub_kriteria',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the kriteria that owns the karakteristik.
     *
     * @return BelongsTo
     */
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    /**
     * Get the sub_kriteria that owns the karakteristik.
     *
     * @return BelongsTo
     */
    public function subKriteria(): BelongsTo
    {
        return $this->belongsTo(Sub_kriteria::class, 'id_sub_kriteria');
    }
}
