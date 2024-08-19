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
        Schema::create('sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Kriteria::class, 'id_kriteria')->constrained('kriteria')->cascadeOnDelete();
            $table->tinyInteger('bobot');
            $table->tinyInteger('operator')->nullable()->comment('1: range; 2: >; 3: <; 4: >=; 5: <=');
            $table->string('nilai_a')->nullable();
            $table->string('nilai_b')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kriteria');
    }
};
