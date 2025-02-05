<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WeightLog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = User::factory()->fixedUser()->create();
        WeightTarget::factory()->create([
            'user_id' => $user->id,
            'target_weight' => 50.0,
        ]);

        WeightLog::factory(35)->for($user)->create();

    }
}
