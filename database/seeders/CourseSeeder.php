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
            'day' => 'Sabtu, Minggu',
            'time_start' => '10:00:00',
            'time_end' => '12:00:00',
            'price' => 100000,
            'status' => 'active',
        ]);
    }
}
