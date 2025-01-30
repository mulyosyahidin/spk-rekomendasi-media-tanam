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
        Schema::create('perhitungan_user_karakteristik', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Perhitungan_user::class, 'id_perhitungan_user')->constrained('perhitungan_users')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Kriteria::class, 'id_kriteria')->constrained('kriteria')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Sub_kriteria::class, 'id_sub_kriteria')->constrained('sub_kriteria')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_user_karakteristik');
    }
};
