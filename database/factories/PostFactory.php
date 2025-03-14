<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'image' => 'posts/example_images.jpg' ,
            'content' => $this->faker->paragraphs(3, true), // Generate 3 random paragraphs
            'user_id' => User::inRandomOrder()->first()->id, // Associate each post with a random user
        ];
    }
}
