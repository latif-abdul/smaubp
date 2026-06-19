<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarArtikelSantri extends Model
{
    use HasFactory;

    protected $table = "artikel_santri_images";

    protected $fillable = [
        'gambar',
    ];

    public function artikel_santri()
    {
        return $this->belongsTo(ArtikelSantri::class, 'id_artikel_santri', 'id');
    }
}
