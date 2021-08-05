<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            $name = $faker->company;
            $project = DB::table('projects')->insert([
                'name' => $name,
                'due' => $faker->dateTime,
                'slug' => Str::slug($name),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $user->projects()->attach($index);
        }
    }
}
