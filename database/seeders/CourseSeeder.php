<?php

namespace Database\Seeders;

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
        \App\Models\Course::truncate();

        \App\Models\Course::create([
            'teacher_id' => 2,
            'category_id' => 1,
            'name' => 'Algoritma Dasar',
            'day' => 'Sabtu, Minggu',
            'time_start' => '10:00:00',
            'time_end' => '12:00:00',
            'price' => 100000,
            'status' => 'active',
        ]);

        \App\Models\Course::create([
            'teacher_id' => 3,
            'category_id' => 1,
            'name' => 'Trigonometri',
            'day' => 'Sabtu, Minggu',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'price' => 50000,
            'status' => 'active',
        ]);

        \App\Models\Course::create([
            'teacher_id' => 4,
            'category_id' => 2,
            'name' => 'English Class Basic for Beginners',
            'day' => 'Sabtu, Minggu',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'price' => 150000,
            'status' => 'active',
        ]);

        \App\Models\Course::create([
            'teacher_id' => 3,
            'category_id' => 3,
            'name' => 'Belajar Sastra Indonesia',
            'day' => 'Sabtu, Minggu',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'price' => 80000,
            'status' => 'active',
        ]);

        \App\Models\Course::create([
            'teacher_id' => 3,
            'category_id' => 3,
            'name' => 'Belajar membuat Puisi untuk Pemula',
            'day' => 'Sabtu, Minggu',
            'time_start' => '13:00:00',
            'time_end' => '14:00:00',
            'price' => 80000,
            'status' => 'active',
        ]);
    }
}
