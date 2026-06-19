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
        Schema::table('santris', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->string('nama_lengkap')->nullable()->change();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable()->change();
            $table->string('tempat_lahir')->nullable()->change();
            $table->date('tanggal_lahir')->nullable()->change();
            $table->string('asal_sekolah')->nullable()->change();
            $table->string('alamat_sekolah')->nullable()->change();
            $table->string('nama_ayah')->nullable()->change();
            $table->string('nama_ibu')->nullable()->change();
            $table->string('nomor_hp_ayah')->nullable()->change();
            $table->string('nomor_hp_ibu')->nullable()->change();
            $table->string('pekerjaan_ayah')->nullable()->change();
            $table->string('pekerjaan_ibu')->nullable()->change();
            $table->enum('penghasilan_ayah', ['0-1.000.000', '1.000.000-3.000.000', '3.000.000-6.000.000', '6.000.000-10.000.000', '>10.000.000'])->nullable()->change();
            $table->enum('penghasilan_ibu', ['0-1.000.000', '1.000.000-3.000.000', '3.000.000-6.000.000', '6.000.000-10.000.000', '>10.000.000'])->nullable()->change();
            $table->enum('jalur_masuk', ['reguler'])->nullable()->change();
            $table->string('foto')->nullable()->change();
            $table->string('bukti_pembayaran')->nullable()->change();
            $table->string('status')->nullable()->change();
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
