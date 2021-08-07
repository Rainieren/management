<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Rainier',
            'email' => 'Rainier.laan@home.nl',
            'password' => Hash::make("Test123"),
            'stripe_id' => 'cus_JzTxgDKjfo3sXX',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user = User::find(1);
        $user->assignRole('Super admin');



    }
}
