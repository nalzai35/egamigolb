<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Image;
use App\User;
use App\Keyword;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    protected $fillable = ['user_id', 'title', 'content'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }
}
