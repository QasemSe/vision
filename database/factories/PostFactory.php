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
    public function definition()
    {
        return [
            'title' => $this->faker->words(4, true),
            'body' => $this->faker->text(400),
            'viewer' => $this->faker->randomNumber(3),
            'image' => $this->faker->imageUrl()
        ];
    }
}
