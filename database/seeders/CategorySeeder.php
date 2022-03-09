<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::truncate();

        \App\Models\Category::create([
            'name' => 'Matematika',
            'thumbnail' => 'cat-3.jpg',
        ]);
        \App\Models\Category::create([
            'name' => 'Bahasa Inggris',
            'thumbnail' => 'cat-3.jpg',
        ]);
        \App\Models\Category::create([
            'name' => 'Bahasa Indonesia',
            'thumbnail' => 'cat-3.jpg',
        ]);
    }
}
