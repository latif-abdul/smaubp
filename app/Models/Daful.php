<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daful extends Model
{
    use HasFactory;

    protected $table = "daful";

    protected $fillable = [
        "id_santris",
        "akta_kelahiran",
        "verifikasi_akta_kelahiran",
        "kartu_keluarga",
        "verifikasi_kk",
        "skl",
        "verifikasi_skl",
        "bukti_transfer",
        "verifikasi_bukti_transfer",
        "foto",
        "verifikasi_foto",
    ];

    public function santri()
    {
        return $this->belongsTo(Santris::class, 'id_santris', 'id');
    }
}
