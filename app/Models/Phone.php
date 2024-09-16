<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $primaryKey = 'number';
    public $incrementing = false;
    protected $fillable = [
        'student_id',
        'number',
        ];
}
