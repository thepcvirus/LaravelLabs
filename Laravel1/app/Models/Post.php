<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory,SoftDeletes,Sluggable;
    protected $fillable = ['title', 'description', 'postedby', 'created_at'];

    public function user(){
        return $this->belongsTo(User::class, 'postedby', 'id');
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}

public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
