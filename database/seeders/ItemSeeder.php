<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('items')->insert([
            [
                'user_id'=> 1,
                'title'=>'Post van den admin',
                'description' => 'Beschrijving van Ronny'
            ],

            [
                'user_id'=> 2,
                'title'=>'Post van Ronny',
                'description' => 'Beschrijving van Ronny'
            ],

            [
                'user_id'=> 2,
                'title'=>'Andere post van Ronny',
                'description' => 'Andere beschrijving van Ronny'
            ]
            ]);
    }
}
