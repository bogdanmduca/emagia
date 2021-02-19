<?php

namespace Emagia\Tests\UnitTests\Skills;

use Emagia\Skills\MagicShield;
use PHPUnit\Framework\TestCase;

class MagicShieldTest extends TestCase{

    private $magicShield;

    protected function setUp(): void
    {
        $this->magicShield = new MagicShield();
    }

    /**
     * @test
     */
    public function magic_shield_class_exists()
    {
        $this->assertIsObject($this->magicShield);
    }

}