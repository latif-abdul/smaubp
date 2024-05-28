<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santris extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'alamat_sekolah',
        'nama_ayah',
        'nama_ibu',
        'nomor_hp_ayah',
        'nomor_hp_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'penghasilan_ayah',
        'penghasilan_ibu',
        'jalur_masuk',
        'foto',
        'bukti_pembayaran',
        'no_pendaftaran',
        'status'
    ];
}
