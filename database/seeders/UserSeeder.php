<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $data = [
            [
                'username' => 'admin',
                'password' => Hash::make('rahasia'),
                'phone' => '0812345678',
                'address' => 'Jl. Raya',
                'status' => 'active',
                'role_id' => 1,
            ],
        ];
        DB::table('users')->insert($data);
    }
}
