<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = "artikel";

    protected $fillable = [
        'judul',
        'penulis',
        'artikel',
        'deleted_at',
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_artikel', 'id');
    }

    public function images()
    {
        return $this->hasMany(GambarArtikel::class, 'id_artikel', 'id');
    }
}
