<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    // public function posts(): MorphToMany
    // {
    //     return $this->morphToMany(Post::class , 'taggable');
    // }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
