<?php

declare(strict_types=1);

namespace Playground;

use PHPUnit\Framework\TestCase;

final class FooClientTest extends TestCase
{
    /** @test */
    public function apply_option()
    {
        $client = new FooClient();
        $this->assertEquals(30, $client->timeout());

        $revert = $client->applyOption(FooClient::withTimeout(60));
        $this->assertEquals(60, $client->timeout());

        $client->applyOption($revert);
        $this->assertEquals(30, $client->timeout());
    }

    /** @test */
    public function construct_with_options()
    {
        $client = new FooClient(
            FooClient::withDelay(60),
            FooClient::withTimeout(60)
        );

        $this->assertEquals(60, $client->delay());
        $this->assertEquals(60, $client->timeout());
    }
}
