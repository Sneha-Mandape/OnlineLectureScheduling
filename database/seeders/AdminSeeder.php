<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $username = 'admin';
        $password = Hash::make('admin123'); // Hash the password using Laravel's Hash facade

        // Insert admin data into the admins table
        DB::table('admins')->insert([
            'username' => $username,
            'password' => $password,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
