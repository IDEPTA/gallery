<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $data = Post::with(['user'])->orderBy("created_at", "DESC")->get();
        return view("welcome", ["data" => $data]);
    }
    public function search(Request $req)
    {
        $day = date('Y-m-d');
        $search = $req['search'];
        $result = Post::with(['user'])
            ->where(function ($query) use ($search) {
                $query->where("title", "like", "%$search%")
                    ->orWhere("description", "like", "%$search%")
                    ->orWhere("text", "like", "%$search%")
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('email', 'like', "%$search%");
                    });
            });
        switch ($req['sort']) {
            case 'new':
                $result = $result->orderBy("created_at", "DESC")->get();
                break;
            case 'old':
                $result = $result->orderBy("created_at", "ASC")->get();
                break;
            case 'day':
                $result = $result->where([
                    ["created_at", '>=', $day . " 00:00:00"],
                    ["created_at", '<=', $day . " 23:59:59"],
                ])->get();
                break;
            case 'month':
                $result = $result->whereMonth("created_at", "2")->get();
                break;
            case 'year':
                $result = $result->whereYear("created_at", date("Y"))->get();
                break;
            default:
                break;
        }
        return view("welcome", ["data" => $result]);
    }
    public function showMoreInfo(Request $req)
    {
        $id = $req['id'];
        $data = Post::find($id);

        $comments = Comment::with('user')->where("post_id", $data->id)->orderBy("created_at", "ASC")->get();
        return view("posts.moreinfo", ["data" => $data, "comments" => $comments]);
    }
    public function showUserpage(Request $req)
    {
        $id = $req['id'];
        $posts = Post::where("user_id", $id)->get();
        $posts_count = Post::where("user_id", $id)->count();
        $comments_count = Comment::where("user_id", $id)->count();
        $user = User::find($id);
        return view("userpage", ['data' => $user, 'posts_count' => $posts_count, 'comments_count' => $comments_count, 'posts' => $posts]);
    }
}
