<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Answers;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answers::create([
            'id'=>1,
            'question_id'=>1,
            'isAnswer'=>true,
            'value'=>'Correct'
        ]);
        Answers::create([
            'id'=>2,
            'question_id'=>1,
            'isAnswer'=>false,
            'value'=>'Wrong'
        ]);
        Answers::create([
            'id'=>3,
            'question_id'=>1,
            'isAnswer'=>false,
            'value'=>'Wrong'
        ]);
        Answers::create([
            'id'=>4,
            'question_id'=>1,
            'isAnswer'=>false,
            'value'=>'Wrong'
        ]);
    }
}
