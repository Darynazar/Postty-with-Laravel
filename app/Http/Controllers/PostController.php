<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->paginate(20);
        return view('posts.index', compact('posts'));
    }
    public function store()
    {
        $data = request()->validate([
            'body' => 'required',
        ]);
        auth()->user()->posts()->create($data);

        return redirect('/posts');

    }

    public function destroy(Post $post){

        $posts = Post::with(['user', 'likes'])->paginate(20);
        return view('posts.index', compact('posts'));
     }
}
