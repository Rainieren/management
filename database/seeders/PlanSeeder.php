<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('plans')->insert([
            'name' => 'Basic',
            'slug' => Str::slug('Basic'),
            'description' => $faker->sentence(20),
            'stripe_plan_id' => 'price_1JL5rtGcNstXotKihULr0MDp',
            'price' => 899,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('plans')->insert([
            'name' => 'Pro',
            'slug' => Str::slug('Pro'),
            'description' => $faker->sentence(20),
            'stripe_plan_id' => 'price_1JL5sVGcNstXotKiQXtKGs9P',
            'price' => 1699,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('plans')->insert([
            'name' => 'Business',
            'slug' => Str::slug('Business'),
            'description' => $faker->sentence(20),
            'stripe_plan_id' => 'price_1JL5t4GcNstXotKi7trl5gEV',
            'price' => 2899,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
