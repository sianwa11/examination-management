<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'class_image' => $this->faker->imageUrl(),
            'created_by' => 1,
        ];
    }
}
