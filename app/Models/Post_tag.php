<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post_tag extends Model
{
    use HasFactory;
    protected $fillable = ['pos_id','tag_id'];
    // public function post(): MorphMany
    // {
    //     return $this->morphMany(Post::class , 'post_tags');

    // }
}

