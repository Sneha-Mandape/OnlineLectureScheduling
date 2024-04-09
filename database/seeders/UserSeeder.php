<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'instructor1@example.com',
            'password' => Hash::make('password1'),
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'instructor2@example.com',
            'password' => Hash::make('password2'),
        ]);


        User::create([
            'name' => 'Instructor',
            'email' => 'instructor3@example.com',
            'password' => Hash::make('password3'),
        ]);
    }
}
