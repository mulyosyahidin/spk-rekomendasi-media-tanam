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
        Schema::create('perhitungan_user_hasil', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Perhitungan_user::class, 'id_perhitungan_user')->constrained('perhitungan_users')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Media_tanam::class, 'id_media_tanam')->constrained('media_tanam')->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Sistem_tanam::class, 'id_sistem_tanam')->constrained('sistem_tanam')->cascadeOnDelete();
            $table->string('kode', 4)->nullable();
            $table->decimal('nilai', 17, 14);
            $table->tinyInteger('peringkat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_user_hasil');
    }
};
