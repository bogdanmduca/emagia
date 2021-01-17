<?php

namespace Emagia\Tests;

use PHPUnit\Framework\TestCase;
use Emagia\Battle;
use Emagia\Character;
use Emagia\Player;
use OutOfRangeException;

class BattleTest extends TestCase
{
    private $battle;

    protected function setUp(): void
    {
        $this->battle = new Battle();
    }

    /**
     * @test
     */
    public function battle_class_exists()
    {
        $this->assertIsObject($this->battle);
    }

    /**
     * @test
     */
    public function a_battle_can_add_player()
    {
        $player = new Player();

        $this->battle->addPlayer($player);

        $this->assertContains($player, $this->battle->players);
    }

    /**
     * @test
     */
    public function a_battle_can_have_a_number_of_rounds()
    {
        $this->battle->setNumberOfRounds(20);
        $this->assertEquals(20, $this->battle->numberOfRounds);
    }

    /**
     * @test
     */
    public function number_of_rounds_must_be_higher_than_zero()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectErrorMessage("Number of rounds must be higher than zero");

        $this->battle->setNumberOfRounds(0);
    }

    /**
     * @test
     */
    public function character_with_biggest_speed_is_the_attacker()
    {
        $orderus = new Character("Orderus");
        $orderus->speed = rand(1, 100);
        $player1 = new Player("John");
        $player1->setCharacter($orderus);


        $beast = new Character("Beast");
        $beast->speed = rand(1, 100);
        $player2 = new Player("CPU");
        $player2->setCharacter($beast);

        $battle = new Battle();
        $battle->addPlayer($player1);
        $battle->addPlayer($player2);

        $battle->decideWhoAttacks();

        $attacker = ($orderus->speed > $beast->speed) ? $player1 : $player2;

        $this->assertEquals($attacker,  $battle->attacker);
    }

    /**
     * @test
     */
    public function character_with_biggest_luck_is_the_attacker_when_equal_speeds()
    {
        $orderus = new Character("Orderus");
        $orderus->speed = 90;
        $orderus->luck = rand(1,100);
        $player1 = new Player("John");
        $player1->setCharacter($orderus);


        $beast = new Character("Beast");
        $beast->speed = 90;
        $beast->luck = rand(1,100);
        $player2 = new Player("CPU");
        $player2->setCharacter($beast);

        $battle = new Battle();

        $battle->addPlayer($player1);
        $battle->addPlayer($player2);

        $battle->decideWhoAttacks();

        $attacker = ($orderus->luck > $beast->luck) ? $player1 : $player2;
        $this->assertEquals($attacker, $battle->attacker);
    }
}
