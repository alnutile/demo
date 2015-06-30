<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\App;

class ExampleTest extends TestCase
{

    use DatabaseMigrations;

    public function testBlogs()
    {
        factory('App\Blog')->create(['title' => "Foo Bar"]);

        factory('App\Blog', 20)->create();

        $this->visit('/blogs')
             ->see('Foo Bar');
    }

    /**
     * @test
     */
    public function should_show_pagination()
    {

        factory('App\Blog', 20)->create();

        factory('App\Blog')->create(['title' => "Foo Bar"]);

        $this->visit('/blogs')
            ->see('Next')
            ->click('Next')
            ->dontSee('Foo Bar');
    }

}
