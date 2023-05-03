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
        DB::table('penggunas')->insert([
            [
            'nama_pengguna' => 'yayan',
            'nomor_telepon' =>001122,
            'email'         => 'yayan@gmail.com',
            'password'      => 'rahasia',
            'role'          => 'user',
            ],[
            'nama_pengguna' => 'admin',
            'nomor_telepon' =>001122, 
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('admin'),
            'role'          => 'admin',
        ]]
    );
    }
}
