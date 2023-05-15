<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'role_id' => 1,
            'name' => 'Mr. Admin',
            'alamat'=> 'kabanjahe',
            'nomor_telepon' => '08121234567',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Mr. Author',
            'alamat'=>'kabanjahe',
            'nomor_telepon' => '08121234567',
            'email' => 'author@gmail.com',
            'password' => Hash::make('rootauthor'),
        ]);
    }
}
