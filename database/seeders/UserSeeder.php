<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();

        // Admin
        \App\Models\User::create([
            'name' => 'Super Admin',
            'role' => 'admin',
            'status' => 'active',
            'avatar' => 'admin.png',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-01 00:00:00',
        ]);

        // Teacher
        \App\Models\User::create([
            'name' => 'Guru',
            'role' => 'teacher',
            'status' => 'active',
            'phone' => '081285723226',
            'address' => 'Jakarta',
            'avatar' => 'teacher.png',
            'email' => 'teacher@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-01 00:00:00',
        ]);

        \App\Models\User::create([
            'name' => 'Gilang Nugraha',
            'role' => 'teacher',
            'status' => 'active',
            'phone' => '081285723226',
            'address' => 'Jakarta',
            'avatar' => 'teacher.png',
            'email' => 'gilang@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-01 00:00:00',
        ]);

        \App\Models\User::create([
            'name' => 'Fabio Charlos',
            'role' => 'teacher',
            'status' => 'active',
            'phone' => '081285723226',
            'address' => 'Jakarta',
            'avatar' => 'teacher.png',
            'email' => 'fabio@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-01 00:00:00',
        ]);

        // Student
        \App\Models\User::create([
            'name' => 'Murid',
            'role' => 'student',
            'status' => 'active',
            'phone' => '081285723226',
            'address' => 'Jakarta',
            'avatar' => 'student.png',
            'email' => 'student@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-01 00:00:00',
        ]);

        \App\Models\User::create([
            'name' => 'Hadoy',
            'role' => 'student',
            'status' => 'active',
            'phone' => '081285723226',
            'address' => 'Jakarta',
            'avatar' => 'student.png',
            'email' => 'hadoy@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-01 00:00:00',
        ]);
    }
}
