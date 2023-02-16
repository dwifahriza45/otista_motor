<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_role')->insert([
            'role' => 'admin',
        ]);

        DB::table('users_role')->insert([
            'role' => 'user',
        ]);
    }
}
