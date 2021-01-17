<?php

namespace Emagia\Tests;

use PHPUnit\Framework\TestCase;
use Emagia\Character;
use Emagia\Stat;

class CharacterTest extends TestCase
{
    private $character;

    protected function setUp(): void
    {
        $this->character = new Character();
    }

    /**
     * @test
     */
    public function character_class_exists()
    {
        $character = new Character;
        $this->assertIsObject($character);
    }

    /**
     * @test
     */
    public function character_can_be_initialized_with_name()
    {
        $character = new Character('Orderus');
        $this->assertEquals('Orderus', $character->name);
    }

    /**
     * @test
     */
    public function a_name_can_be_set_for_character()
    {
        $this->assertEquals("", $this->character->name);

        $this->character->setName("Defence");

        $this->assertEquals("Defence", $this->character->name);
    }

    /**
     * @test
     */
    public function stats_can_be_added_to_character()
    {
        $defence = new Stat("Attack");
        $this->character->addStat($defence);
        $this->assertContains($defence, $this->character->stats);
    }

    /**
     * @test
     */
    public function stats_can_be_removed_from_character(){
        $health = new Stat("Health");
        $this->character->addStat($health);
        $this->assertContains($health, $this->character->stats);
        
        $this->character->removeStat($health);
        $this->assertNotContains($health, $this->character->stats);
    }
}
