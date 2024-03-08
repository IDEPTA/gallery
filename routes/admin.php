<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\usersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::prefix("admin")->middleware("admin")->group(function () {
    Route::get("logout",[AdminController::class, "logout"])->name("admin.logout");
    Route::resource('users', usersController::class)->middleware("admin");
});