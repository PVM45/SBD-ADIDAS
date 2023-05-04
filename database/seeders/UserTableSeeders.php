<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'nama_user' => 'yayan',
            'nomor_telepon' =>82274373432,
            'email'         => 'yayan@gmail.com',
            'password'      => Hash::make('rahasia'),
            'role'          => 'user',
            'alamat'          => 'tm',
            ],[
            'nama_user' => 'admin',
            'nomor_telepon' =>82274373432, 
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('admin'),
            'role'          => 'admin',
            'alamat'          => 'tm',
        ]]
    );
    }
}
