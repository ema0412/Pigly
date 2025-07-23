<?php

namespace Database\Factories;

use App\Models\WeightLogs;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogsFactory extends Factory
{
    protected $model = WeightLogs::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,5),
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomNumber(),
            'calories' => $this->faker->randomNumber(),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->text(120),
        ];
    }
}
