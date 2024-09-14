<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Sonic',
            'description' => null,
            'available_at' => 'Free oct 01 - oct 02',
            'price' => null,
            'image' => './images/sonic.jpg',
            'category_id' => Category::where('name', 'Coming Soon')->first()->id

        ]);
        Post::create([
            'title' => 'Tom & Jerry',
            'description' => 'Catch me if you can!',
            'available_at' => null,
            'price' => null,
            'image' => './images/tom-and-jerry.jpg',
            'category_id' => Category::where('name', 'Free to Play')->first()->id
        ]);
        Post::create([
            'title' => 'Call of Duty',
            'description' => 'Its time for battle!',
            'available_at' => null,
            'price' => '49',
            'image' => './images/callofduty.jpg',
            'category_id' => Category::where('name', 'Pay to Play')->first()->id
        ]);
    }
}
