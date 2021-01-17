<?php

namespace Emagia\Tests;

use PHPUnit\Framework\TestCase;
use Emagia\Round;

class RoundTest extends TestCase
{
    /**
     * @test
     */
    public function round_class_exists()
    {
        $round = new Round;
        $this->assertIsObject($round);
    }
}
