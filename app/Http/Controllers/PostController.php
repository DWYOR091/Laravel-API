<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::with('writer:id,username', 'comments:id,post_id,user_id,comments_content')->get();
        // dd($post);
        // return response()->json(['data' => $post]);
        return PostResource::collection($post);
    }

    public function show($id)
    {
        $post = Post::with('writer:id,username')->findOrFail($id);
        return new PostDetailResource($post);
    }

    public function store(Request $req)
    {
        $req->validate([
            'title' => 'required|max:255',
            'news_content' => 'required'
        ]);
        //bisa gini
        $post = Post::create([
            'title' => $req->title,
            'news_content' => $req->news_content,
            'author' => Auth::id()
        ]);

        //atau bisa gini
        //$req['author'] = Auth::user()->id
        // $post = Post::create($req->all());
        // return response()->json($post);

        return response()->json($post->loadMissing('writer:id,username'));
        //fungsi load sama seperti with with manggil relasi
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'title' => 'required',
            'news_content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($req->all());

        return new PostDetailResource($post->LoadMissing('writer:id,username'));
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return new PostDetailResource($post->LoadMissing('writer:id,username'));
    }
}