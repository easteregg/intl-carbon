<?php

namespace Tests\Unit;

use Tests\Stubs\Post;
use Tests\TestCase;

class LocalizesDatesTest extends TestCase
{
    /**
     * @test
     */
    public function it_provides_long_formatting()
    {
        $post = factory(Post::class)->create();

        $this->assertTrue(method_exists('longDate', $post));
    }
}
