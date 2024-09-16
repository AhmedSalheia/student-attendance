<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $hidden = [
        'password',
    ];

    protected $fillable = [
        'id',
        'full_name',
        'gender',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class)->withTimestamps();
    }


    public function phones()
    {
        return $this->hasMany(Phone::class, 'student_id', 'id');
    }
}
