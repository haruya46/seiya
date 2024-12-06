<?php

namespace App\Models;
use App\Models\Access_controls;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded =[];

    protected $fillable = [
        'title',
        'body',
        'image',
        'description',
    ];
    public function access_controls() {
        return $this->hasOne(Access_controls::class, 'post_id', 'id');
    }

}
