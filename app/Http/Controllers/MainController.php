<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function custom_posts()
    {
        $posts = Post::viewer()->get();
        dd($posts);
    }
}
