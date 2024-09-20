<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasil_perhitungan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tanaman::class, 'id_tanaman')->nullable()->constrained('tanaman')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Sistem_tanam::class, 'id_sistem_tanam')->nullable()->constrained('sistem_tanam')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Media_tanam::class, 'id_media_tanam')->nullable()->constrained('media_tanam')->cascadeOnDelete();
            $table->string('kode_alternatif', 4);
            $table->decimal('nilai', 17, 14);
            $table->tinyInteger('peringkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_perhitungan');
    }
};
