<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title', 
        'description', 
        'text', 
        'img',
        'user_id',
        'date',
        "updated_at"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
