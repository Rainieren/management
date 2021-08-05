<?php

namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(IssueSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(TicketSeeder::class);
        $this->call(PlanSeeder::class);
    }
}
