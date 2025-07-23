<?php

namespace Database\Factories;

use App\Models\WeightLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    protected $model = WeightLog::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,5),
            'date' => $this->faker->date(),
            'weight' => $this->faker->numberBetween(10,300),
            'calories' => $this->faker->randomNumber(),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->text(120),
        ];
    }
}
