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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('username');
            $table->string('password');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->string('email')->unique();
            $table->foreign('program_studi_kode_jurusan')->references('program_studis')->on('kode_jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};