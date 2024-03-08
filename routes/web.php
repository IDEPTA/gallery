<?php

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Crud\PostController;
use App\Http\Controllers\Crud\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [Controller::class, 'index'])->name('home');
Route::post("/search",[Controller::class, 'search'])->name("search");
//show forms

//login/register_process

Route::post("login_process", [AuthController::class, "login_process"])->name("login_process");
Route::post("register_process", [AuthController::class, "register_process"])->name("register_process");



Route::middleware(["auth:web,admin"])->group(function () {
    Route::get("moreinfo/{id}", [Controller::class, 'showMoreInfo'])->name("moreinfo");
    Route::get("userpage/{id}", [Controller::class, 'showUserpage'])->name("userpage");
    Route::get("logout", [AuthController::class, "logout"])->name("logout");
    Route::post("create/{id}", [CommentController::class, "create"])->name("create");
    Route::get("delete/{post_id}/{comment_id}", [CommentController::class, "delete"])->name("delete");
    Route::post("edit/{post_id}/{comment_id}", [CommentController::class, "edit"])->name("editComment");

    Route::get("showFormPost", [PostController::class, "showFormPost"])->name("showFormPost");

    Route::post("createPost", [PostController::class, "create"])->name("createPost");
    Route::get("deletePost/{post_id}", [PostController::class, "delete"])->name("deletePost");
    Route::get("editform/{post_id}", [PostController::class, "editForm"])->name("editform");

    Route::post("editPost/{post_id}", [PostController::class, "edit"])->name("editPost");
    

});

Route::middleware("guest")->group(function () {
    Route::get("login", [AuthController::class, "showLoginForm"])->name("login");
    Route::get("register", [AuthController::class, "showRegisterForm"])->name("register");

    Route::get('/auth/redirect', [AuthController::class, "github"])->name("socialite.github");
    Route::get('/auth/callback', [AuthController::class, "githubCallback"])->name("socialite.github.Callback");

    Route::get('/auth/google/redirect', [AuthController::class, "google"])->name("socialite.google");
    Route::get('/auth/google/callback', [AuthController::class, "googleCallback"])->name("socialite.google.Callback");
});

require __DIR__ . '/admin.php';

//<input type="hidden" name="_token" 
//value="GQeWu77lHnyZUJFne0uqylVLMmNDtXBAOvnVX591" autocomplete="off">