<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Create a new user if not provided
            'title' => $this->faker->sentence(6), // Generate a random title
            'content' => $this->faker->paragraph(5), // Generate random content
            'image_path' => $this->faker->imageUrl(640, 480, 'posts', true), // Generate a random image URL
            'published' => $this->faker->boolean(80), // 80% chance of being published
        ];
    }
}
