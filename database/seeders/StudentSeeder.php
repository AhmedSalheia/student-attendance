<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = Student::create([
            'id' => '120191633',
            'full_name' => 'hamza masoud',
            'gender' => 'male',
        ]);
        $x->phones()->create(['number' => '0594716621']);
        $x->courses()->sync([1]);
    }
}
