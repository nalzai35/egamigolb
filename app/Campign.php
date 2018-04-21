<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Template;
use App\Keyword;

class Campign extends Model
{
    protected $fillable = [
        'template_id',
        'name',
        'post_title',
        'image_title',
        'image_description',
        'category_id',
        'user_id',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function keyword()
    {
        return $this->hasMany(Keyword::class);
    }
}
