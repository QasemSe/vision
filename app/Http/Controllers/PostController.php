<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::paginate(20);
//        $posts = Post::OrderByDesc('id')->paginate(20);
//        $posts = Post::select('title', 'body')->get();
//        $posts = Post::select('title', 'body')->take(5)->get();
//        $posts = Post::find(20);

        $count = 20;

        if (request()->has('count') && \request()->count != 'all') {
            $count = request()->count;
        }

        if (request()->has('count') && \request()->count == 'all') {
            $count = Post::count();
        }

        if (request()->has('search')) {
            $posts = Post::where('title', 'like','%' . request()->search . '%')->orWhere('body', 'like','%' . request()->search . '%')->OrderByDesc('id')->paginate($count);
        }
        else {
            $posts = Post::OrderByDesc('id')->paginate($count);
        }

        return view('posts.index', compact('posts'));
    }
}
