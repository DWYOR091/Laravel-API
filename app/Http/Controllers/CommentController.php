<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CreateRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{
    public function store(CreateRequest $req)
    {
        $req['user_id'] = Auth::id();
        //bisa pake ini
        // $req['user_id'] = auth()->user()->id;

        $comment = Comment::create($req->all());
        // return response()->json($comment->LoadMissing('commentator'));
        return new CommentResource($comment->LoadMissing('commentator:id,username'));
    }

    public function update(UpdateRequest $req, $id)
    {
        $comment = Comment::find($id);
        $comment->update($req->all());

        return new CommentResource($comment->LoadMissing('commentator:id,username'));
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return new CommentResource($comment->LoadMissing('commentator:id,username'));
    }
}