<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming you have at least one user
        $user = User::first();

        if ($user) {
            Task::factory()->count(10)->create([
                'user_id' => $user->id,
            ]);
        }

        $this->call([
            TaskSeeder::class,
        ]);
    }
}
