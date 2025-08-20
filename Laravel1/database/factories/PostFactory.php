<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;

    public function definition()
    {
        // return [
        //     'title' => $this->faker->sentence(),
        //     'description' => $this->faker->paragraphs(3, true),
        //     'postedby' => User::factory(),
        //     'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        //     'updated_at' => now(),
        // ];

        return [
        'title' => $this->faker->sentence(),
        'description' => $this->faker->paragraphs(3, true),
        'postedby' => User::inRandomOrder()->first()->id,
        'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        'updated_at' => now(),
    ];
    }
}
