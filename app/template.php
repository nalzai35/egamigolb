<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Campign;

class template extends Model
{
    protected $fillable = ['name', 'type', 'content'];

    public function campign()
    {
        return $this->hasMany(Campign::class);
    }
}
