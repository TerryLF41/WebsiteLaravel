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
        Schema::create('mk_tawars', function (Blueprint $table) {
            $table->unsignedBigInteger('matkul_kode_matkul');
            $table->unsignedBigInteger('proyek_pendidikan');
            $table->id("kelas");
            $table->string("jam");
            $table->string("hari");
            $table->foreign('matkul_kode_matkul')->references('kode_matkul')->on('matkuls');
            $table->foreign('proyek_pendidikan')->references('id')->on('proyek_pendidikans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
