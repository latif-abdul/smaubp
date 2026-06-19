<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentSantri extends Model
{
    use HasFactory;

    protected $table = "comment_santri";

    protected $fillable = [
        'id_artikel',
        'id_comment',
        'name',
        'email',
        'comment',
    ];

    public function artikel()
    {
        return $this->belongsTo(ArtikelSantri::class, 'id_artikel_santri', 'id');
    }

    public function reply()
    {
        return $this->hasMany(CommentSantri::class, 'id_comment', 'id');
    }

    public function comment()
    {
        return $this->belongsTo(CommentSantri::class, 'id_comment', 'id');
    }
}
