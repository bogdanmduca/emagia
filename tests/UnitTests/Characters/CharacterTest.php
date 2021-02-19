<?php

namespace Emagia\Tests\UnitTests\Characters;

use Emagia\Characters\Character;
use Emagia\Stats\CharacterStat;
use PHPUnit\Framework\TestCase;

class CharacterTest extends TestCase{

    private $character;

    protected function setUp(): void
    {
        $this->character = new Character("Beast",
        new CharacterStat(60, 90),
        new CharacterStat(60, 90),
        new CharacterStat(40, 60),
        new CharacterStat(40, 60),
        new CharacterStat(25, 40));
    }

    /**
     * @test
     */
    public function character_class_exists()
    {
        $this->assertIsObject($this->character);
    }

}