<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return Inertia::render('Admin/Posts/PostIndex', [
            'posts' => PostResource::collection($posts)
        ]);
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Admin/Posts/Create');
    }

    public function store(CreatePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        Post::create($request->validated());
        return to_route('posts.index');
    }

    public function edit(Post $post): \Inertia\Response
    {
        return Inertia::render('Admin/Posts/Edit', [
            'post' => new PostResource($post)
        ]);
    }

    public function update(CreatePostRequest $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        $post->update($request->validated());
        return to_route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
