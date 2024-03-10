<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\loginValidation;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\registerValidation;
use App\Http\Controllers\Auth\DefaultController;

class AuthController extends DefaultController
{

    public function showLoginForm()
    {
        return view("forms.login");
    }
    public function showRegisterForm()
    {
        return view("forms.register");
    }
    public function logout()
    {
        $this->service->logout();
        return redirect(route("home"));
    }
    public function login_process(loginValidation $req)
    {
        if ($this->service->login_process($req)) {
            return redirect(route("home"));
        }
        return redirect(route("login"));
    }
    public function register_process(registerValidation $req)
    {
        if ($this->service->register_process($req)) {
            return redirect(route("login"));
        }
        return redirect(route("register"));
    }
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('github_id', $githubUser->id)->first();

        if (!$user) {
            $user = User::create([

                'name' => $githubUser->name,
                'lastname' => $githubUser->nickname,
                'email' => $githubUser->email,
                'password' => bcrypt(str()->random(25)),
                'github_id' => $githubUser->id,
            ]);
        }
        Auth::login($user, true);
        return redirect(route("home"));
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback(){
        $googlebUser = Socialite::driver('google')->user();
        dd($googlebUser);
    }
}
