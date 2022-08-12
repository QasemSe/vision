<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Insurance;
use App\Models\Post;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function one_to_one()
    {
//        $user = User::find(1);

//        $insurance = Insurance::where('user_id', $user->id)->first();
//        dd($user->insurance);

//        $insurance = Insurance::find(1);
//        dd($insurance->user);

        $users = User::with('insurance')->get();
        return view('relations.one_to_one', compact('users'));
    }

    public function one_to_many()
    {
//        $post = Post::find(2);
//        $comment = Comment::find(1);
//        dd($comment->user);

        $id = 2;
        $post = Post::with('comments', 'comments.user')->where('id', $id)->first();
        return view('relations.one_to_many', compact('post', 'id'));
    }

    public function one_to_many_data(Request $request)
    {
        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => 2
        ]);

        // another way
//        $post = Post::find($request->post_id);
//        $post->comments()->create([
//            'comment' => $request->comment,
//            'post_id' => $request->post_id,
//            'user_id' => 2
//        ]);

        return redirect()->back();
    }

    public function many_to_many()
    {
//        $std = Student::find(1);
//        dd($std->subjects);

//        $subject = Subject::find(1);
//        dd($subject->students);

        $subjects = Subject::all();
        $std = Student::find(1);

        return view('relations.many_to_many', compact('subjects', 'std'));
    }

    public function many_to_many_data(Request $request)
    {
//        dd($request->all());
        $std = Student::find(1);
        $std->subjects()->sync($request->subject);

//        $std->subjects->attach(); // just for add
//        $std->subjects->detach(); // just for remove
//        $std->subjects->sync(); // do the two process
        return redirect()->back();
    }
}
