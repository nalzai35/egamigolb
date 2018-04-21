<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use Cviebrock\EloquentSluggable\Sluggable;

class Image extends Model
{
    use Sluggable;
    protected $fillable = ['post_id', 'title', 'description', 'path'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
