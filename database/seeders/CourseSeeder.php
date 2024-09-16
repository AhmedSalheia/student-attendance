<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = Course::create([
            'teacher_name' => 'حاتم حماد',
            'book_name' => 'AWS',
            'subject' => "حوسبة سحابية",
            'room_number' => "K404",
        ]);
    }
}
