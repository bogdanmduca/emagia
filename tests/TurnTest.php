<?php

namespace Emagia\Tests;

use PHPUnit\Framework\TestCase;
use Emagia\Turn;

class TurnTest extends TestCase
{
    /**
     * @test
     */
    public function turn_class_exists()
    {
        $turn = new Turn;
        $this->assertIsObject($turn);
    }
    
}
