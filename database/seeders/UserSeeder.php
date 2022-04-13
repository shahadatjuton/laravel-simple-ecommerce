<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'role_id'=>'1',
            'name'=> 'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin123'),
        ]);
        DB::table('users')->insert([
            'role_id'=>'2',
            'name'=> 'Customer',
            'email'=>'customer@gmail.com',
            'password'=>bcrypt('customer123'),
        ]);
    }
}
