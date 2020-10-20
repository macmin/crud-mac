<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_article';
    protected $fillable = ['title', 'body_article', 'id_user', 'url_foto'];

    public function comments() {
        return $this->belongsTo(Comment::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
