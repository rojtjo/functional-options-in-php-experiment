<?php

declare(strict_types=1);

namespace Playground;

use Closure;

final class FooClient
{
    private $delay = 10;
    private $timeout = 30;

    public function __construct(Closure ...$options)
    {
        foreach ($options as $option) {
            $this->applyOption($option);
        }
    }

    public static function withDelay(int $delay): Closure
    {
        return function (FooClient $client) use ($delay) {
            $previousDelay = $client->delay;
            $client->delay = $delay;

            return self::withDelay($previousDelay);
        };
    }

    public static function withTimeout(int $timeout): Closure
    {
        return function (FooClient $client) use ($timeout) {
            $previousTimeout = $client->timeout;
            $client->timeout = $timeout;

            return self::withTimeout($previousTimeout);
        };
    }

    public function applyOption(Closure $option): Closure
    {
        return $option($this);
    }

    public function delay(): int
    {
        return $this->delay;
    }

    public function timeout(): int
    {
        return $this->timeout;
    }
}
