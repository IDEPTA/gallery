<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\registerValidation;

class Service
{
    public function logout()
    {
        $user = Auth::user();
        $user->remember_token = null;
        $user->save();
        Auth::logout();
    }
    public function login_process($req)
    {
        $remember = isset($req["remember"]);
        $data = $req->validated();
        if (
            Auth::guard("admin")->attempt($data, $remember) ||  Auth::guard("web")->attempt($data, $remember)) {
            return true;
        } else {
            return false;
        }
    }
    public function register_process($req)
    {
        if ($req->validated()) {
            $data = $req->validated();
            if (User::create($data)) {
                return redirect(route("login"));
            }
        }
    }
}
