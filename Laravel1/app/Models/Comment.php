<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['post_id', 'user_id', 'comment'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function post(){
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
