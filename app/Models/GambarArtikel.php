<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarArtikel extends Model
{
    use HasFactory;

    protected $table = "artikel_images";

    protected $fillable = [
        'gambar',
    ];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id');
    }
}
