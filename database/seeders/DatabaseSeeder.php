<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Post;
// use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Uncomment if you want to seed users
        // \App\Models\User::factory(10)->create();

        // Example of creating a specific user
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // // Seed 20 posts
        // Post::factory(20)->create();

        // // Seed 20 tags
        // Tag::factory(20)->create();

        // Seed settings using SettingsSeeder
        $this->call(SettingsSeeder::class);
    }
}
