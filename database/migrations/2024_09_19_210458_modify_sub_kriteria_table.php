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
        Schema::table('sub_kriteria', function (Blueprint $table) {
            $table->dropColumn(['bobot', 'operator', 'nilai_a', 'nilai_b']);
            $table->string('sub_kriteria')->nullable()->after('id_kriteria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_kriteria', function (Blueprint $table) {
            $table->tinyInteger('bobot');
            $table->tinyInteger('operator')->nullable()->comment('1: range; 2: >; 3: <; 4: >=; 5: <=');
            $table->string('nilai_a')->nullable();
            $table->string('nilai_b')->nullable();

            $table->dropColumn('sub_kriteria');
        });
    }
};
