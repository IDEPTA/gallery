<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class testa extends Model
{
    use HasFactory;

    public $text = 'hello world';
    public function AuthChekTest(){
        $result = "no";
        if(Auth::check()){
            $result = "yes";
            return $result;
        };
        return $result;
    }
}
