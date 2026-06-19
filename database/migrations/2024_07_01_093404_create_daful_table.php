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
        Schema::create('daful', function (Blueprint $table) {
            $table->id();
            $table->integer('id_santris');
            $table->string('akta_kelahiran')->nullable();
            $table->string('verifikasi_akta_kelahiran')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('verifikasi_kk')->nullable();
            $table->string('skl')->nullable();
            $table->string('verifikasi_skl')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->string('verifikasi_bukti_transfer')->nullable();
            $table->string('foto')->nullable();
            $table->string('verifikasi_foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daful');
    }
};
