<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BestAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id' => rand(1, 15),
            'created_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2 week'),
        ];
    }
}
