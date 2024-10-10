<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), // Creates a new user if none exists
            'title' => $this->faker->sentence,
            'is_completed' => $this->faker->boolean,
            'order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
