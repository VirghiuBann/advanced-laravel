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

        // if (request()->has('max_count')) {
        //     $posts->take(request('max_count'));
        // }

        // $posts = $posts->get();


        $posts = Post::allPosts()
            ->get();

        return view('post.index', compact('posts'));
    }
    public function create()
    {
        return view('post.create');
    }
}
