<?php

namespace Database\Factories;

use App\Models\WeightLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class WeightLogFactory extends Factory
{
    protected $model = WeightLog::class;

    public function definition()
    {
        $exerciseOptions = ['ジョギング', '筋トレ', 'ウォーキング', 'サイクリング', 'ヨガ', '水泳', 'ストレッチ'];
        $exercise_content = $this->faker->randomElement($exerciseOptions);

        $minutes = $this->faker->numberBetween(30, 120);
        $exercise_time = Carbon::createFromTime(0, 0, 0)->addMinutes($minutes)->format('H:i');

        return [
            'date' => Carbon::now()->subDays(rand(1, 30)),
            'weight' => $this->faker->randomFloat(1, 50, 70),
            'calories' => $this->faker->numberBetween(1000, 3000),
            'exercise_time' => $exercise_time,
            'exercise_content' => $exercise_content,
        ];
    }
}
