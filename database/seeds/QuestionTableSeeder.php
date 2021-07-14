<?php

use Illuminate\Database\Seeder;
use  App\Question;
use illuminate\Support\Facades\DB;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Question::class,20)->create()->make();
    }
}
