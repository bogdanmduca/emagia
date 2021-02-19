<?php

namespace Emagia\Tests\UnitTests\Skills;

use Emagia\Skills\RapidStrike;
use PHPUnit\Framework\TestCase;

class RapidStrikeTest extends TestCase{

    private $rapidStrike;

    protected function setUp(): void
    {
        $this->rapidStrike = new RapidStrike();
    }

    /**
     * @test
     */
    public function magic_shield_class_exists()
    {
        $this->assertIsObject($this->rapidStrike);
    }

}