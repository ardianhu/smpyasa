<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'banner',
        'status',
        'is_published',
        'is_featured',
        'category_id',
        'user_id',
        'tag_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'post_tag');
    }
}
