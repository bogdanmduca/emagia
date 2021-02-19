<?php

namespace Emagia\Tests\UnitTests\Stats;

use Emagia\Stats\StatModifier;
use Emagia\Stats\StatModType;
use PHPUnit\Framework\TestCase;

class StatModifierTest extends TestCase{

    private $statModifier;

    protected function setUp(): void
    {
        $this->statModifier = new StatModifier(20, 60,StatModType::Flat);
    }

    /**
     * @test
     */
    public function magic_shield_class_exists()
    {
        $this->assertIsObject($this->statModifier);
    }

}