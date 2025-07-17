<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'user_id' => 1, // Using existing user ID 1
            'title' => fake()->sentence(4), // Explicit word count
            'slug' => fake()->unique()->slug(3),
            'description' => fake()->paragraph(2),
            'body' => fake()->paragraphs(3, true),
            'featured_image' => fake()->imageUrl(640, 480, 'nature', true, 'Post Image'),
            'published_at' => fake()->optional(0.8)->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
