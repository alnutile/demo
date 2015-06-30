<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class BlogTableSeeder extends Seeder {

    public function run()
    {
        factory('App\Blog', 20)->create();

        factory('App\Blog')->create(['title' => "Foo Bar"]);
    }

}