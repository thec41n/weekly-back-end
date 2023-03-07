<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Import class Post
        $posts = Post::all();
        /**
         * Untuk mendapatkan data Post kita gunakan format JSON
         * Refrensi https://laravel.com/docs/9.x/responses#json-responses */
        // return response()->json(['database' => $posts]);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json(['database' => $post]);
    }
}
