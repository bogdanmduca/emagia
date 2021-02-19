<?php

namespace Emagia\Tests\UnitTests\Stats;

use Emagia\Stats\CharacterStat;
use PHPUnit\Framework\TestCase;

class CharacterStatTest extends TestCase{

    private $CharacterStat;

    protected function setUp(): void
    {
        $this->CharacterStat = new CharacterStat(40, 60);
    }

    /**
     * @test
     */
    public function magic_shield_class_exists()
    {
        $this->assertIsObject($this->CharacterStat);
    }

}