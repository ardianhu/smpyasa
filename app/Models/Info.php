<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = [
        'about',
        'phone',
        'email',
        'address',
        'visi',
        'misi',
        'tujuan',
        'sambutan_kasek',
        'youtube_link',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'tiktok_link',
    ];

    protected $casts = [
        'visi' => 'array',
        'misi' => 'array',
        'tujuan' => 'array',
    ];
}
