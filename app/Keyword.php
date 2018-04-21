<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campign;
use App\Post;

class Keyword extends Model
{
    protected $fillable = ['keyword', 'campign_id', 'post_id'];
    public $timestamps = false;

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function campign()
    {
        return $this->belongsTo(Campign::class);
    }
}
