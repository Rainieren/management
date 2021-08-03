<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $user = User::find(1);

        foreach(range(1, 10) as $index) {
            $project = DB::table('projects')->insert([
                'name' => $faker->company,
                'due' => $faker->dateTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $user->projects()->attach($index);
        }
    }
}
