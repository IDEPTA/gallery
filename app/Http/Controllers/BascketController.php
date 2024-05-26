<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BascketController extends Controller
{

    public function getBasket($id)
    {
        $basket = Basket::where("user_id", Auth::id())->first();
        if ($basket) {
            $items = [];
            foreach ($basket->items_id as $value) {
                $items[] = Post::find($value);
            }
            return view("basket", ["data" => $items]);
        } else {
            return view("basket", ["msg" => "Корзина пуста"]);
        }
    }

    public function store($id)
    {
        $basket = Basket::where("user_id", Auth::id())->first();
        if ($basket) {
            $arr = $basket->items_id;
            array_push($arr, $id);
            $basket->items_id = $arr;
            $basket->save();
        } else {
            $data["user_id"] = Auth::id();
            $data["items_id"] = [$id];
            Basket::create($data);
        }
        return redirect(route("moreinfo", ['id' => $id]));
    }
}
