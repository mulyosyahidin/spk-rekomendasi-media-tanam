<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perhitungan_user_hasil extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'perhitungan_user_hasil';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_perhitungan_user',
        'id_media_tanam',
        'id_sistem_tanam',
        'kode',
        'nilai',
        'peringkat',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the sistem_tanam that owns the Perhitungan_user_hasil
     */
    public function sistemTanam(): BelongsTo
    {
        return $this->belongsTo(Sistem_tanam::class, 'id_sistem_tanam');
    }

    /**
     * Get the media_tanam that owns the Perhitungan_user_hasil
     */
    public function mediaTanam(): BelongsTo
    {
        return $this->belongsTo(Media_tanam::class, 'id_media_tanam');
    }
}
