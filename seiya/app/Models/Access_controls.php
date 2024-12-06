<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access_controls extends Model
{
    public function article() {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
    protected $fillable = [
        'post_id',
        'status',
    ];
}
