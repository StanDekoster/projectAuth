<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->insert([
            [
                'question' => 'What is this?',
                'answer' => 'A project',
                
            ],
            [
                'question' => 'How do I use this?',
                'answer' => 'Explanation.',
                
            ],
            [
                'question' => 'What about ....?',
                'answer' => 'Explanation.',
                
            ],
        ]);
    }
    }
