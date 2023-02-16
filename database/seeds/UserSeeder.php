<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 


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
            'name' => 'Teddy',
            'email' => 'teddy@gmail.com',
            'password' => Hash::make('admin'),
            'alamat' => 'Jln assad',
            'no_hp' => '08123456',
            'motor_id' => 1,
            'role_id' => 2,
        ]);
    }
}
