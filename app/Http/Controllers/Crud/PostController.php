<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
class PostController extends Controller
{
    public function showFormPost(){
        return view("forms.addPostForm");
    }
    public function create(PostValidation $req){
        $data = $req->validated();
        $data["img"] = $req->file('img')->getClientOriginalName();
        $path = $req->file('img')->storeAS("img",$data["img"],'public');
        $data["user_id"] =  Auth::id();
        Post::insert($data);
        return redirect(route("userpage", ["id" => Auth::id()]));
    }
    public function delete(Request $req){
        $id = $req['post_id'];
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }
    public function editForm(Request $req){
        $id = $req['post_id'];
        $post = Post::findOrFail($id);
        return view("forms.editPostForm", ["data" => $post]);
    }
    public function edit(PostValidation $req){
        $id = $req['post_id'];
        $post = Post::findOrFail($id);
        $data = $req->validated();
        if(isset($data['img'])){
            $data["img"] = $req->file('img')->getClientOriginalName();
            $path = $req->file('img')->storeAS("img",$data["img"],'public');
        }
        $post->update($data);
        return redirect(route("moreinfo",['id' => $id]));
    }
}
