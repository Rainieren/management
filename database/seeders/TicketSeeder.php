<?php

namespace Database\Seeders;

use App\Models\Issue;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TicketSeeder extends Seeder
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
            $name = $faker->sentence(3);
            $tickets = DB::table('tickets')->insert([
                'title' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->text,
                'priority_id' => $faker->numberBetween(0,3),
                'user_id' => 1,
                'project_id' => $faker->numberBetween(0,10),
                'number' => $faker->unixTime,
                'status' => 'Submitted',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $user->tickets()->attach($index);
        }
    }
}
