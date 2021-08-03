<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Super admin']);
        Role::create(['name' => 'Employee']);
        Role::create(['name' => 'Client']);
        Role::create(['name' => 'Admin']);
    }
}
