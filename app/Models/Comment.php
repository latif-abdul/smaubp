<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comment";

    protected $fillable = [
        'id_artikel',
        'id_comment',
        'name',
        'email',
        'comment',
    ];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel', 'id');
    }

    public function reply()
    {
        return $this->hasMany(Comment::class, 'id_comment', 'id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'id_comment', 'id');
    }
}
