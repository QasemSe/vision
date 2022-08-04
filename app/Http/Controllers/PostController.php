<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|min:5|max:50',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
            'body' => 'required'
        ]);

        // Upload File
        $img = $request->file('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('uploads'), $img_name);

        // Save to Database
        Post::create([
            'title' => $request->title,
            'image' => $img_name,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')->with('msg', 'Post created successfully!')->with('type', 'success');
    }

    public function destroy($id)
    {
//        Post::destroy($id);
        $post = Post::find($id);

        $post->delete();
        File::delete(public_path('uploads/' . $post->image));

        return redirect()->route('posts.index')->with('msg', 'Post deleted successfully!')->with('type', 'danger');
    }
}
