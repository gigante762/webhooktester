<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory(5)->create();

        foreach ($user as $u) {
            $apps = App::factory(5)->create([
                'user_id' => $u->id,
            ]);

            foreach ($apps as $app) {
                Location::factory(5)->create([
                    'app_id' => $app->id,
                ])->each(function ($location) {
                    \App\Models\EmergencyType::factory(5)->create([
                        'location_id' => $location->id,
                    ]);
                });
            }
        }
    }
}
