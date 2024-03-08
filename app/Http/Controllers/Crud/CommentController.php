<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CommentValidation;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(CommentValidation $req){
        $post_id = $req["id"];
        $user_id = Auth::id();
        $req = $req->validated();
        Comment::insert([
            "user_id" => $user_id,
            "post_id" => $post_id,
            "text" => $req['comment'],
        ]);
        return redirect(route('moreinfo',["id" => $post_id]));
    }
    public function delete(Request $req){
        $comment_id = $req['comment_id'];
        $post_id = $req['post_id'];
        Comment::findOrFail($comment_id)->delete();
        return redirect(route('moreinfo',["id" => $post_id]));
    }

    public function edit(Request $req){
        $updatedText = $req["text"];
        $comment_id = $req['comment_id'];
        $post_id = $req['post_id'];
        echo $updatedText;
        Comment::findOrFail($comment_id)->update(['text' =>  $updatedText]);
        return redirect(route('moreinfo',["id" => $post_id]));

    }
    
}
