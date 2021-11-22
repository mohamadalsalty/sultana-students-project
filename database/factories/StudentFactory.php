<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'date_of_birth' => $this->faker->date,
            'class_id' => $this->faker->numberBetween(1,30),
            'country_id' => $this->faker->numberBetween(1,30)
        ];
    }
}
