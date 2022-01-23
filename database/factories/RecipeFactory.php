<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->unique->slug,
            'user_id' => User::factory(),
            'title' => $this->faker->unique->realTextBetween(30,60),
            'description' => $this->faker->realTextBetween(300, 800),
            'image' => $this->faker->imageUrl,
            'amount_people' => $this->faker->numberBetween(2,12),
//            'ingredients' => json_encode([$this->faker->randomElements(["onion", "carrot", "soja", "chicken", "beef", "veal", "peas", "lettuce", "potatoes", "rice", "butter", "salt", "pepper", "kurkuma", "dried pepper", "vegetable oil", "olive oil", "grape oil", "bell pepper", "shallot", "sweet potatoes"],4)]),
//            'steps' =>  json_encode([$this->faker->randomElements(["Add the onions to the pan and fry the onions untill brown", "Add the rest of the vegetables to the pan", "Cut the vegetables in small dices", "Cook the chicken until it's white", "Add the stock", "Add the spices"],4)]),
            'published' => 1,
        ];
    }
}
