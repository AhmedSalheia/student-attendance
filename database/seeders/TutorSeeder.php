<?php

namespace Database\Seeders;

use App\Models\Tutor;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = Tutor::create([
            'phone' => '123456789',
            'name' => 'عبدالرحمن',
            'password' => \Hash::make('123456789'),
        ]);
        $x->courses()->sync([1]);
    }
}
