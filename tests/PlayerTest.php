<?php

namespace Emagia\Tests;

use Emagia\Character;
use PHPUnit\Framework\TestCase;
use Emagia\Player;

class PlayerTest extends TestCase
{
    /**
     * @test
     */
    public function player_class_exists()
    {
        $player = new Player;
        $this->assertIsObject($player);
    }

    /**
     * @test
     */
    public function player_can_be_initialized_with_name()
    {
        $player = new Player("Player 1");
        $this->assertEquals("Player 1", $player->name);
    }

    /**
     * @test
     */
    public function player_can_have_a_character()
    {
        $player = new Player();
        $orderus = new Character("Orderus");
        
        $player->setCharacter($orderus);

        $this->assertEquals($orderus, $player->character);
    }
}
