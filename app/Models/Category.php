<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function posts(){
        return $this->belongsToMany(Post::class, 'category_post', 'category_id', 'post_id');
    }
}
