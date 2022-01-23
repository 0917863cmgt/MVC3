<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'recipe_id' => Recipe::factory(),
            'comment_id' => null,
            'message' => $this->faker->realTextBetween(100, 300),
        ];
    }
}
