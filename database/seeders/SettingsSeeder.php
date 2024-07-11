<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'blog_name' => "Ahmed's blog Programmer",
            'blog_phone' => "+20 1146049069",
            'blog_email' => "ag1386840@gmail.com",
            'address' => "Egypt",
            'description' => "Blog for all programmer",
        ]);
    }
}
