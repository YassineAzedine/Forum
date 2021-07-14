<?php

use Illuminate\Database\Seeder;
use App\Category;
use illuminate\Support\Facades\DB;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Category::class,20)->create()->make();

    }
}
