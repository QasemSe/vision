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
        $post = new Post();
        return view('posts.create', compact('post'));
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

    public function destroy()
    {
        if (request()->post_id)
        {
            $post = Post::findOrFail(request()->post_id);
            File::delete(public_path('uploads/' . $post->image));
            $post->delete();

            $count = 20;

            if (request()->has('count') && request()->count != 'all') {
                $count = request()->count;
            }

            if (request()->has('count') && request()->count == 'all') {
                $count = Post::count();
            }

            if (request()->has('search')) {
                $posts = Post::where('title', 'like','%' . request()->search . '%')->orWhere('body', 'like','%' . request()->search . '%')->OrderByDesc('id')->paginate($count);
            }
            else {
                $posts = Post::OrderByDesc('id')->paginate($count);
            }

            return view('posts.table', compact('posts'))->render();
        }

        return view('posts.index');
//        Post::destroy($id);
    }

    // NORMAL FORM DELETE
//    public function destroy($id)
//    {
////        Post::destroy($id);
//        $post = Post::find($id);
//
//        File::delete(public_path('uploads/' . $post->image));
//
//        $post->delete();
//
//        return redirect()->route('posts.index')->with('msg', 'Post deleted successfully!')->with('type', 'danger');
//    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'title' => 'required|min:5|max:50',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg',
            'body' => 'required'
        ]);

        $post = Post::findOrFail($id);

        $img_name = $post->image;

        if ($request->has('image')) {
            // Upload File
            $img = $request->file('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('uploads'), $img_name);
        }

        // Save to Database
        $post->update([
            'title' => $request->title,
            'image' => $img_name,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index')->with('msg', 'Post updated successfully!')->with('type', 'warning');
    }
}
