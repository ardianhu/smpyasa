<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'nisn',
        'nis',
        'address',
        'father',
        'mother',
        'graduation_year',
        'student_class_id'
    ];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }
}
