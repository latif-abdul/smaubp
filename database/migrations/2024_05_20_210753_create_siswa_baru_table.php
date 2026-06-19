<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('santris', function (Blueprint $table) {
        $table->id();
        $table->string('email')->unique();
        $table->string('nama_lengkap');
        $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->string('asal_sekolah');
        $table->string('alamat_sekolah');
        $table->string('nama_ayah');
        $table->string('nama_ibu');
        $table->string('nomor_hp_ayah');
        $table->string('nomor_hp_ibu');
        $table->string('pekerjaan_ayah');
        $table->string('pekerjaan_ibu');
        $table->enum('penghasilan_ayah', ['0-1.000.000', '1.000.000-3.000.000', '3.000.000-6.000.000', '6.000.000-10.000.000', '>10.000.000']);
        $table->enum('penghasilan_ibu', ['0-1.000.000', '1.000.000-3.000.000', '3.000.000-6.000.000', '6.000.000-10.000.000', '>10.000.000']);
        $table->enum('jalur_masuk', ['reguler']);
        $table->string('foto');
        $table->string('bukti_pembayaran');
        $table->string('status');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
