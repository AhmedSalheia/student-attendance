<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tutor extends Authenticatable
{
	use HasFactory;
    protected $primaryKey = "phone";
    public $incrementing = false;

    protected $hidden = [
		'password',
	];
    protected $fillable = [
        'name',
        'phone',
        'password',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class,'teach', 'tutor_id', 'course_id');
    }
}
