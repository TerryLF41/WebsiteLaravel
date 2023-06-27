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
            $table->id();
            $table->unsignedBigInteger('matkul_kode_matkul');
            $table->string("jam");
            $table->string("hari");
            $table->timestamps();
            $table->foreign('matkul_kode_matkul')->references('kode_matkul')->on('matkuls');
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
