<?php

namespace Database\Factories;

use App\Models\User;
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
        
        $users = User::pluck("id")->toArray();
        return [
            'title' => fake()->name(),
            'description' => fake()->text(10),
            'text' => fake()->text(50),
            "user_id" => fake()->randomElement($users),
            'img'  => fake()->randomElement([
                "1.png",
                "2.png",
                "3.png",
                "4.png",
                "5.png",
            ]),
        ];
    }
}
