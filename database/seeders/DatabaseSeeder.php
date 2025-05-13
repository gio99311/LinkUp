<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = [
            'Instagram',
            'Twitter',
            'Linkedin',
            'Youtube',
            'Facebook',
            'Tiktok',
            'Spotify',
            'Pinterest',
            'Reddit',
            'Snapchat',
            'MyWebsite',
            'Whatsapp',
            'Github',
            'Discord',
        ];

        foreach ($categories as $category) {
                Category::create(['name' => $category,
            ]);
        }
    }
}
