<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Question::create([
            'id' => 1,
            'test_id' => 1,
            'type' => 'Multiple',
            'description' => 'Question 1'
        ]);
    }
}
