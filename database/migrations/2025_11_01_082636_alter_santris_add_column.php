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
        Schema::table('santris', function (Blueprint $table) {
            $table->string('nik')->nullable();
            $table->string('nisn')->nullable();
            $table->string(column: 'anak_ke')->nullable();
            $table->string(column: 'jumlah_saudara')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('nomor_kk')->nullable();
            $table->string('ttl_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('ttl_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('alamat_ortu')->nullable();
            $table->string('dusun')->nullable();
            $table->string('desa')->nullable(); 
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten_kota')->nullable();
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
