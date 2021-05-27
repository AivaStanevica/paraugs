<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); //fetch all blog posts from DB
        return view('blog.index', [
            'posts' => $posts,
        ]); //returns the view with posts
    }

    public function create()
    {
        return view('blog.create');
    }


    public function store(Request $request)
    {
        $newPost = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => 1
        ]);

        return redirect('blog/' . $newPost->id);
    }

    public function show(Post $post)
    {
        return view('blog.show', [
            'post' => $post,
        ]); //returns the view with the post
    }


    public function edit(Post $post)
    {
        return view('blog.edit', [
            'post' => $post,
        ]); //returns the edit view with the post
    }


    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('blog/' . $post->id);
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/blog');
    }
}
