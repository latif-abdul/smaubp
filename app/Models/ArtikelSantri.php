<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelSantri extends Model
{
    use HasFactory;

    protected $table = "artikel_santri";

    protected $fillable = [
        'judul',
        'penulis',
        'artikel',
        'deleted_at',
    ];

    public function comment_santri()
    {
        return $this->hasMany(CommentSantri::class, 'id_artikel', 'id');
    }

    public function images()
    {
        return $this->hasMany(GambarArtikelSantri::class, 'id_artikel_santri', 'id');
    }
}

