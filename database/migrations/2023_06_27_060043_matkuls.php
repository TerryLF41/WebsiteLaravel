<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matkuls', function (Blueprint $table) {
            $table->integer('kode_matkul');
            $table->string("nama_matkul");
            $table->unsignedBigInteger("sks");
            $table->boolean("status");
            $table->unsignedBigInteger("semester");
            $table->unsignedBigInteger('program_studi_kode_jurusan');
            $table->timestamps();
            $table->foreign('program_studi_kode_jurusan')->references('kode_jurusan')->on('program_studis');
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