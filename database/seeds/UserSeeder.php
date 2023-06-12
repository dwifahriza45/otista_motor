<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


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
            'image' => 'profile/default_profile.png',
            'role_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Dwi Fahriza',
            'email' => 'dwifahriza@gmail.com',
            'password' => Hash::make('admin'),
            'image' => 'profile/default_profile.png',
            'role_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
