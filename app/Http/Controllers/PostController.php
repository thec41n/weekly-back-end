<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

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
        $post = Post::with('writer:id,username')->findOrFail($id);
        // Digunakan untuk return data hanya 1 saja
        // Jangan lupa import class PostDetailResource
        return new PostDetailResource($post);
    }
}