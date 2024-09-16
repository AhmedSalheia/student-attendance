<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_name',
        'book_name',
        'subject',
        'room_number',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'teach', 'course_id', 'tutor_id');
    }
}
