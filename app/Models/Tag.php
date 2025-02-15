<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function post(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'post_id', 'tag_id');
    }
}
