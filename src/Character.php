<?php

namespace Emagia;

class Character
{
    public $name;

    public $health;

    public $strength;

    public $defence;

    public $speed;

    public $luck;

    public $stats = [];

    public function __construct(string $name = "")
    {
        $this->name = $name;

        $health = new Stat("Health");
        $health->setBoundaries(70, 100);
        $this->addStat($health);
        $strength = new Stat("Strength");
        $strength->setBoundaries(70, 80);
        $this->addStat($strength);
        $defence = new Stat("Defence");
        $defence->setBoundaries(45, 55);
        $this->addStat($defence);
        $speed = new Stat("Speed");
        $speed->setBoundaries(45, 50);
        $this->addStat($speed);
        $luck = new Stat("Luck");
        $luck->setBoundaries(10, 30);
        $this->addStat($luck);
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function addStat(Stat $stat)
    {
        $this->stats[$stat->name] = $stat;
    }

    public function removeStat(Stat $stat)
    {
        $key = array_search($stat, $this->stats);

        if ($key === false) {
            return;
        }

        unset($this->stats[$key]);

        $this->stats = array_values($this->stats);
    }
}
