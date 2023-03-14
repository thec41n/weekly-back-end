<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         // Jangan lupa untuk import Auth
        $currentUser = Auth::user();
        // Jangan lupa untuk import Post
        $post = Post::findOrFail($request->id);

        // Jika author dari postingan tersebut bukan id dari currentuser, maka data not found
        if ($post->author != $currentUser->id) {
            return response()->json(['Message' => 'data not found'], 404); 
        }
        return $next($request);
    }
}
