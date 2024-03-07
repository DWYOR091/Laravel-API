<?php

namespace App\Http\Middleware;

use App\Models\Post;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PemilikPostingan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd('good');
        $user = Auth::id();
        $post = Post::findOrFail(
            $request->id
        );

        if ($user != $post->author) {
            return response()->json(['message' => 'Data Not Found'], 404);
        }
        return $next($request);
    }
}