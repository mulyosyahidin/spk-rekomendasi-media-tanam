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
        Schema::table('karakteristik_tanaman', function (Blueprint $table) {
            $table->dropColumn('nilai');

            $table->foreignIdFor(\App\Models\Sub_kriteria::class, 'id_sub_kriteria')->constrained('sub_kriteria')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('karakteristik_tanaman', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_sub_kriteria');

            $table->string('nilai');
        });
    }
};
