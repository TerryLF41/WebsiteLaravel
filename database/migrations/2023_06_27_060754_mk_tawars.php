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
        Schema::create('matkuls', function (Blueprint $table) {
            $table->foreign('matkul_kode_matkul')->references('matkuls')->on('kode_matkul');
            $table->foreign('proyek_pendidikan')->references('proyek_pendidikan')->on('id');
            $table->id("kelas");
            $table->string("jam");
            $table->string("hari");
            $table->string("kuota");
            $table->integer("semester");
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
