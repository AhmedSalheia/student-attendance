<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'room_number',
        'course_id',
        'description'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
