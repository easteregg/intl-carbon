<?php

namespace Tests\Integration;

use Tests\TestCase;

class PackageProviderControllerTest extends TestCase
{
    /**
     * @test
     */
    public function it_promises_to_go()
    {
        $this->visit("package-provider")
            ->assertResponseOk();

        $this->assertEquals(
            "Let's Go",
            $this->call('get', 'package-provider')
                 ->getContent()
        );


    }
}
