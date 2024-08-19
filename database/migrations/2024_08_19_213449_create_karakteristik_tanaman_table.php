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
        Schema::create('karakteristik_tanaman', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tanaman::class, 'id_tanaman')->constrained('tanaman')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Kriteria::class, 'id_kriteria')->constrained('kriteria')->cascadeOnDelete();
            $table->string('nilai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karakteristik_tanaman');
    }
};
