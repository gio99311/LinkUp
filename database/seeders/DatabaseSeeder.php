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
            ['name' => 'Instagram' , 'icons' => 'instagram'],
            ['name' => 'Twitter', 'icons' => 'twitter'],
            ['name' => 'Linkedin', 'icons' => 'linkedin'],
            ['name' => 'Youtube', 'icons' => 'youtube'],
            ['name' => 'Facebook', 'icons' => 'facebook'],
            ['name' => 'Tiktok', 'icons' => 'tiktok'],
            ['name' => 'Spotify', 'icons' => 'spotify'],
            ['name' => 'Pinterest', 'icons' => 'pinterest'],
            ['name' => 'Reddit', 'icons' => 'reddit'],
            ['name' => 'Snapchat', 'icons' => 'snapchat'],
            ['name' => 'Whatsapp', 'icons' => 'whatsapp'],
            ['name' =>  'Github', 'icons' => 'github'],
            ['name' =>  'Discord', 'icons' => 'discord'],
  
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'icons' => $category['icons']
            ]);
        }
    }
}
