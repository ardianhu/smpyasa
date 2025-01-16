<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'tupoksi',
        'info_humas'
    ];
}
