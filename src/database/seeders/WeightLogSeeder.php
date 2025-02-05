<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WeightLog;
use Illuminate\Database\Seeder;

class WeightLogSeeder extends Seeder

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        $user->weightLogs()->createMany(
        WeightLog::factory(35)->make()->toArray()
    );
}
