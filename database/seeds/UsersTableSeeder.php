<?php

use Illuminate\Database\Seeder;
use App\User;
use illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class,20)->create()->make();

    }
}
