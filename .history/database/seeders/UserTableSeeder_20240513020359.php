<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Robin',
            'last_name' => 'Rana',
            'email' => 'robin@example.com',
            'phone_number' =>'9878765654',
            'submit_count' =>'1'
        ]);

        User::create([
            'first_name' => 'Rohit',
            'last_name' => 'Kumar',
            'email' => 'rohit@example.com',
            'phone_number' =>'9876343322',
            'submit_count' =>'1'
        ]);
    }
}
