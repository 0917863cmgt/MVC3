<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'is_parent' => 0,
            'parent_id' => $this->faker->numberBetween(1,4),
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
        ];
    }
}
