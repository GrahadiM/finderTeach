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

        \App\Models\User::create([
            'name' => 'Super Admin',
            'role' => 'admin',
            'status' => 'active',
            'avatar' => 'admin.png',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-02 00:00:00',
        ]);
        
        \App\Models\User::create([
            'name' => 'Abdurrahman GM',
            'role' => 'teacher',
            'status' => 'active',
            'phone' => '085767113554',
            'address' => 'Jakarta Timur',
            'avatar' => 'teacher.png',
            'email' => 'teacher@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-02 00:00:00',
        ]);

        \App\Models\User::create([
            'name' => 'Hadoy',
            'role' => 'student',
            'status' => 'active',
            'phone' => '085767113554',
            'address' => 'Jakarta Timur',
            'avatar' => 'student.png',
            'email' => 'student@test.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'email_verified_at' => '2021-12-02 00:00:00',
        ]);
    }
}
