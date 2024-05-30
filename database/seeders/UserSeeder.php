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
     */
    public function run(): void
    {
      
            DB::table('users')->insert([
                [
                    'name' =>'admin',
                    'email'=>'admin@ehb.be',
                    'password' => Hash::make('Password!321'),//chatgpt
                    'isAdmin' =>true,
                    'isWorker' =>true
                ],
                [
                    'name' =>'Ronny',
                    'email'=>'ronny@ronny.ronny',
                    'password' => Hash::make('ronny123'),//chatgpt
                    'isAdmin' =>false,
                    'isWorker' =>true
                ],
                [
                    'name' =>'Cindy',
                    'email'=>'cindy@cindy.cindy',
                    'password' => Hash::make('cindy123'),//chatgpt
                    'isAdmin' =>false,
                    'isWorker' =>false
                ],
            ]);
    }
}
