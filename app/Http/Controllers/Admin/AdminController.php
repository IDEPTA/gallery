<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logout(){
        $admin = Auth::guard("admin")->user();
        $admin ->remember_token = "";
        $admin->save();
        Auth::guard('admin')->logout();
        return redirect(route("home"));
    }
}
