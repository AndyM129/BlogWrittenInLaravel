<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'intro',
        'content',
        'published_at'
    ];

    public function hasManyComments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }

}
