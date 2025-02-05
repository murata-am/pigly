<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WeightTarget;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;


    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function fixedUser()
    {
        return $this->state(fn (array $attributes) => [
            'name' => 'テスト太郎',
            'email' => 'test@example.com',
            'password' => Hash::make('testpass'),
            'remember_token' => Str::random(10),
            ]);

    }

    public function withWeightTarget()
    {
        return $this->afterCreating(function (User $user) {
            WeightTarget::factory()->create([
                'user_id' => $user->id,
                'target_weight' => 50.0, // 固定の目標体重を設定
            ]);
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
                'email_verified_at' => null,
        ]);
    }
}

