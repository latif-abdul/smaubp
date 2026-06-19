<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencapaianAlumni extends Model
{
    use HasFactory;

    protected $table = "pencapaian_alumni";

    protected $fillable = [
        'name',
        'universitas',
        'prodi',
        'perolehan_hafalan',
        'deleted_at',
    ];
}
