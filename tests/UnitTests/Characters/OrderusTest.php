<?php

namespace Emagia\Tests\UnitTests\Characters;

use Emagia\Characters\Orderus;
use PHPUnit\Framework\TestCase;

class OrderusTest extends TestCase{

    private $orderus;

    protected function setUp(): void
    {
        $this->orderus = new Orderus();
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
        $this->assertIsObject($this->orderus);
    }

}