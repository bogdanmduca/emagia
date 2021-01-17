<?php

namespace Emagia;

class Game
{
    public $battle;

    public function initializeCPU()
    {
        $beast = new Character("Beast");
        $health = new Stat("Health");
        $health->setBoundaries(60, 90);
        $beast->addStat($health);
        $strength = new Stat("Strength");
        $strength->setBoundaries(60, 90);
        $beast->addStat($strength);
        $defence = new Stat("Defence");
        $defence->setBoundaries(40, 60);
        $beast->addStat($defence);
        $speed = new Stat("Speed");
        $speed->setBoundaries(40, 60);
        $beast->addStat($speed);
        $luck = new Stat("Luck");
        $luck->setBoundaries(25, 40);
        $beast->addStat($luck);

        $player = new Player("CPU");
        $player->setCharacter($beast);

        return $player;
    }

    public function initializePlayer()
    {
        $orderus = new Character("Orderus");
        $health = new Stat("Health");
        $health->setBoundaries(70, 100);
        $orderus->addStat($health);
        $strength = new Stat("Strength");
        $strength->setBoundaries(70, 80);
        $orderus->addStat($strength);
        $defence = new Stat("Defence");
        $defence->setBoundaries(45, 55);
        $orderus->addStat($defence);
        $speed = new Stat("Speed");
        $speed->setBoundaries(45, 50);
        $orderus->addStat($speed);
        $luck = new Stat("Luck");
        $luck->setBoundaries(10, 30);
        $orderus->addStat($luck);

        $player = new Player("CPU");
        $player->setCharacter($orderus);
        return $player;
    }

    public function __construct()
    {
        $this->battle = new Battle();
        $this->battle->addPlayer($this->initializeCPU());
        $this->battle->addPlayer($this->initializePlayer());
        $this->battle->setNumberOfRounds(10);
    }

    public function load()
    {
        $winner = $this->battle->start();

        foreach ($this->battle->rounds as $round) {
            echo "<strong>Round details</strong> <br/>";
            foreach ($round->turns as $turn) {
                echo "Turn details:<br/>";
                echo  $turn->attacker->name . " attacked " . $turn->defender->name . ".<br/>";
                echo  $turn->attacker->name . " inflicted " . $turn->damage . " damage.<br/>";
                if ($turn->defenderLife > 0)
                    echo  $turn->defender->name . " was left with " . $turn->defenderLife . " health.<br/>";
                else {
                    echo  $turn->defender->name . " was killed by " . $turn->attacker->name . "<br/>";
                }
                echo "<br/>";
            }
        }

        echo "Winner is " . $winner->name . "</br>";
        echo "Refresh to start again <br/>";
    }
}
