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
        Schema::create('nilai_sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Sistem_tanam::class, 'id_sistem_tanam')->nullable()->constrained('sistem_tanam')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Media_tanam::class, 'id_media_tanam')->nullable()->constrained('media_tanam')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Kriteria::class, 'id_kriteria')->nullable()->constrained('kriteria')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Sub_kriteria::class, 'id_sub_kriteria')->nullable()->constrained('sub_kriteria')->cascadeOnDelete();
            $table->tinyInteger('bobot');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_sub_kriteria');
    }
};
