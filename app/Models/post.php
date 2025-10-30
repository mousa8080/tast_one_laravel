<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'slug',
        'featured_image',
        'status',
        'excerpt'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }
}
