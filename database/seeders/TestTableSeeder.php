<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Test;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Test::create([
            'id' => 1,
            'name' => 'CCAT',
            'description' => 'Criteria Cognitive Aptitude Test',
            'category' => 'General'
        ]);

    }
}
