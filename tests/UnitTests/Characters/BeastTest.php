<?php

namespace Emagia\Tests\UnitTests\Characters;

use Emagia\Characters\Beast;
use Emagia\Characters\Character;
use Emagia\Stats\CharacterStat;
use PHPUnit\Framework\TestCase;

class BeastTest extends TestCase{

    private $beast;

    protected function setUp(): void
    {
        $this->beast = new Beast();
        // $this->character = new Character("Beast",
        // new CharacterStat(60, 90),
        // new CharacterStat(60, 90),
        // new CharacterStat(40, 60),
        // new CharacterStat(40, 60),
        // new CharacterStat(25, 40));
    }

    /**
     * @test
     */
    public function beast_class_exists()
    {
        $this->assertIsObject($this->beast);
    }

}