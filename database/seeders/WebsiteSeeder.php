<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Website::create([
            'logo' => '',
            'favicon'  => 'favicon.ico',
            'title_web' => 'ECOURSES',
            'name_web'  => '<span class="text-primary">E</span>COURSES',
            'footer_web'  => 'Domain Name',
            'mail'  => 'info@example.com',
            'phone'  => '+012 345 6789',
            'address'  => '123 Street, New York, USA',
            'twitter'  => '',
            'facebook'  => '',
            'linkedin'  => '',
            'instagram'  => '',
        ]);
    }
}
