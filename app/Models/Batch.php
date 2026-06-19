<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = "batch";

    protected $fillable = [
        'name',
        'date_from',
        'date_to',
        'tanggal_pengumuman',
        'tanggal_tes',
        'deleted_at',
        'tahun_ajaran_id',
    ];
}
