<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use Carbon\carbon;

class ExampleTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //given
        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create(['created_at' => carbon::now()->addMonth()]);


        //when

        $posts = Post::archives();

        //then

        $this->assertEquals([
            [
                "year" => $first->created_at->format('Y'),
                "month" => $first->created_at->format('F'),
                "published" => 1
            ],
            [
                "year" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1
            ]

        ],$posts);

    }


    public function archivesSidebarTest()
    {


    }
}
