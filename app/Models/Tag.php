<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }
}
