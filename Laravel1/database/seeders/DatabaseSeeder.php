<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
     public function run()
    {
        // First seed users if needed
        //\App\Models\User::factory(10)->create();
        
        // Then seed posts
        $this->call([
            PostSeeder::class,
        ]);
    }
}
