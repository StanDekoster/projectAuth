<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
            DB::table('users')->insert([
                [
                    'name' =>'admin',
                    'email'=>'admin@ehb.be',
                    'password'=>'Password!321',
                    'isAdmin' =>true,
                    'isWorker' =>true
                ],
                [
                    'name' =>'Ronny',
                    'email'=>'ronny@ronny.ronny',
                    'password'=>'ronny123',
                    'isAdmin' =>false,
                    'isWorker' =>true
                ],
                [
                    'name' =>'Cindy',
                    'email'=>'cindy@cindy.cindy',
                    'password'=>'cindy123',
                    'isAdmin' =>false,
                    'isWorker' =>false
                ],
            ]);
    }
}
