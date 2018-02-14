<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //anulamos le revision de llaves foraneas al ejecutar los seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(PostsTableSeeder::class);

        //activamoos le revision de llaves foraneas despues de ejecutar los seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
