<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'title'=>'Post van  admin',
                'description' => 'Beschrijving van Admin',
                'coverImage' =>'coverImages/appel.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'user_id'=> 1,
                'title'=>'Post 2',
                'description' => 'Beschrijving 2',
                'coverImage' =>'coverImages/banaan.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'user_id'=> 1,
                'title'=>'Post 3',
                'description' => 'Beschrijving 3',
                'coverImage' =>'coverImages/peer.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ]);
    }
}
