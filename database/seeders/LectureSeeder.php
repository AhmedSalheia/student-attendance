<?php

namespace Database\Seeders;

use App\Models\Lecture;
use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = Lecture::create([
            'title' => 'المحاضرة التعريفية',
            'description' => 'اللقاء الأول تعريف المادة',
            'course_id' => '1',
            'room_number' => 'K404',
        ]);
        $x->students()->sync(['120191633']);
    }
}
