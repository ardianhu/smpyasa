<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id', 'photos'];

    protected $casts = [
        'photos' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
