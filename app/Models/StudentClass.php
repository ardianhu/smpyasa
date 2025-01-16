<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sub'
    ];

    public function student()
    {
        return $this->hasMany(Student::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->name}-{$this->sub}";
    }
}
