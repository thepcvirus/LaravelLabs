<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        if (class_exists(Post::class)) {
            Post::factory()->count(5)->create();
        } else {
            $this->command->error('Post model not found!');
        }
    }
}
