<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Pipeline\Pipeline;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::query();

        // if (request()->has('active')) {
        //     $posts->where('active', request('active'));
        // }

        // if (request()->has('sort')) {
        //     $posts->orderBy('title', request('sort'));
        // }

        // $posts = $posts->get();

        // $posts = app(Pipeline::class)
        //     ->send(Post::query())
        //     ->through([
        //         \App\QueryFilters\Active::class,
        //         \App\QueryFilters\Sort::class,
        //         \App\QueryFilters\MaxCount::class,
        //     ])
        //     ->thenReturn()
        //     ->get();

        $posts = Post::allPosts()
            ->get();

        return view('post.index', compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }
}
