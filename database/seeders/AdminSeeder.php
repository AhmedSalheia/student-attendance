<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'administrator',
            'name' => 'admin',
            'password' => \Hash::make('Pa$$w0rd'),
        ]);
    }
}
