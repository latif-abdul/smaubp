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
        Schema::table('artikel', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('daful', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('galeri', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('sambutan', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('santris', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('slideshow', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
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
