<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_perhitungan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'hasil_perhitungan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_tanaman',
        'id_sistem_tanam',
        'id_media_tanam',
        'kode_alternatif',
        'nilai',
        'peringkat',
    ];

    public function sistemTanam()
    {
        return $this->belongsTo(Sistem_tanam::class, 'id_sistem_tanam');
    }

    public function mediaTanam()
    {
        return $this->belongsTo(Media_tanam::class, 'id_media_tanam');
    }
}
