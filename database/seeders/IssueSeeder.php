<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IssueSeeder extends Seeder
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
            $name = $faker->realText(16);

            $issue = DB::table('issues')->insert([
                'title' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->text,
                'project_id' => $faker->numberBetween($min = 0, $max = 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $user->issues()->attach($index);
            $issue = Issue::find($index);
            $issue->comments()->attach($index);

        }


    }
}
