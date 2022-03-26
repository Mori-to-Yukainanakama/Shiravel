<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'question_id' => rand(1, 3),
            'content' => $this->faker->realText(50),
            'created_at' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2 week'),
        ];
    }
}
