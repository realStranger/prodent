<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Specialization;
use App\Models\User;
use App\Models\UserSpecialization;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $statuses = UserStatus::factory(10)->create();

        foreach ($statuses as $status) {
            User::factory()->create([
                'status_id' => $statuses->random()->id
            ]);
        }

        $specs = Specialization::factory(rand(5,20))->create([]);

        foreach ($specs as $spec) {
            $spec->update([
                'parent_id' => fake()->optional()->randomElement(Specialization::all()->pluck('id'))
            ]);

            UserSpecialization::factory()->create([
                'user_id' => fake()->randomElement(Specialization::all()->pluck('id')),
                'specialization_id' => $spec->id
            ]);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
