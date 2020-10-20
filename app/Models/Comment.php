<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_comment';
    protected $fillable = ['id_user', 'id_article', 'body_comment'];

    public function article() {
        return $this->hasOne(Article::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
