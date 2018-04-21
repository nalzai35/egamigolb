<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Grabber;
// use App\Http\Controllers\KeywordController;
use App\Keyword;
use App\Post;
use App\User;
use App\Image;
// use App\Http\Controllers\PostController;

class Poster extends Controller
{
    public function post()
    {
        $kw = Keyword::where('status', 0)->first()->keyword;
        $title = str_replace('-', ' ', str_slug($kw));
        $category = 2;
        $post = Post::create([
            'user_id' => User::all()->shuffle()->first()->id,
            'title' => title_case($title),
            'content' => title_case($title).' ini adalah kontennya',
        ]);
        $post->categories()->attach($category);

        $grab = Grabber::grab($kw);

        foreach ($grab as $key => $value) {
            Image::create([
                'post_id' => $post->id,
                'title' => $value['title'],
                'description' => $value['alt'],
                'path' => $value['url'],
            ]);
        }

        Keyword::where('keyword', $kw)->update(['status' => 1]);
        return 'Sukses memposting "'.$post->title.'"';
        // return Grabber::grab($kw);
    }
}
